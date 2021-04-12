<?php 

class usuario{

	private $BaseDatos;
	private $conexion; // Necesario para después poder desconectar la BD

	private $existe_usuario;

	private $id_usuario;
	private $usuario;
	private $email;
	private $contrasenia;
	private $nombre;
	private $apellidos;
	private $tipo_usuario;

	private $fecha_nacimiento;
	private $biografia;
	private $foto_perfil;
	private $direccion;
	
	/* CONSTRUCTOR */
	public function __construct($id){
		$this->conexion = BD::getInstance('localhost', 'athenea', 'athenea', 'libreria');
		$this->BaseDatos = $this->conexion->conectar();

		$this->id_usuario = $id;
		$sql_usuario = "SELECT * FROM usuarios U JOIN info_usuarios I ON U.id_usuario=I.id_usuario WHERE U.id_usuario=$this->id_usuario";
		$consulta_usuario = $this->BaseDatos->query($sql_usuario);
		if($consulta_usuario->num_rows > 0){
			while($fila_usuario = mysqli_fetch_assoc($consulta_usuario)){
				$this->completarAtributos(true, $fila_usuario['usuario'], $fila_usuario['email'], $fila_usuario['contrasenia'], $fila_usuario['nombre'], $fila_usuario['apellidos'], $fila_usuario['tipo_usuario'], $fila_usuario['fecha_nacimiento'], $fila_usuario['biografia'], $fila_usuario['foto_perfil'], $fila_usuario['direccion']);
			}

		}	
		else{
			$this->completarAtributos(false, null, null, null, null, null, null, null, null, null, null);
		}
		$consulta_usuario->free();

	}

	/* FUNCIONES GENERALES */
	public function __get($property){
	    if(property_exists($this, $property)) {
	        return $this->$property;
	    }
	}

    public function __set($property, $value){
	    if(property_exists($this, $property)) {
	        $this->$property = $value;
	    }
	}

	public function desconectarBD(){
		$this->conexion->desconectar($this->BaseDatos);
	}

	/* OTRAS FUNCIONES */
	public function registrar_usuario($usuario, $email, $contrasenia, $nombre, $apellidos, $tipo_usuario, $fecha_nacimiento){
		$this->usuario = $usuario;
		$this->email = $email;
		$this->contrasenia = password_hash($contrasenia, PASSWORD_DEFAULT);
		$this->nombre = $nombre;
		$this->apellidos = $apellidos;
		$this->tipo_usuario = $tipo_usuario;
		$this->fecha_nacimiento = $fecha_nacimiento;

		$sql = "INSERT INTO usuarios VALUES (NULL, '$this->usuario', '$this->email', '$this->contrasenia', '$this->nombre', '$this->apellidos', '$this->tipo_usuario')";
		$sql2 = "INSERT INTO info_usuarios VALUES (NULL, NULL, NULL, NULL, $this->fecha_nacimiento)";
		$consulta1 = $this->BaseDatos->query($sql);
		$consulta2 = $this->BaseDatos->query($sql2);
		$consulta2->free();	
		$consulta1->free();
	}

	public function compruebaPassword($password){
    	return password_verify($password, $this->contrasenia);
  	}

  	public function cambiaPassword($nuevoPassword){
    	$this->contrasenia = password_hash($nuevoPassword, PASSWORD_DEFAULT);
    	$sql_password = "UPDATE usuarios SET contrasenia='$this->contrasenia' WHERE id_usuario=$this->id_usuario";
    	$consulta_password = $this->BaseDatos->query($sql_password);
    	$consulta_password->free();
  	}

  	public function logout(){
	  //Doble seguridad: unset + destroy
	  unset($_SESSION["tipo_usuario"]);
	  unset($_SESSION["usuario"]);
	  unset($_SESSION["id_usuario"]);
	  unset($_SESSION["login"]);

	  session_destroy();
	  session_start();
	}

	public function login($user, $password){
		$this->buscarUsuario($user, $password);

		if($this->existe_usuario === true){
			session_start();
			$_SESSION["login"] = true;
			$_SESSION["tipo_usuario"] = $this->tipo_usuario;
			$_SESSION["usuario"] = $this->usuario;
			$_SESSION["id_usuario"] = $this->id_usuario;
		}
		else{
			$_SESSION["login"] = false;
		}

		return $this->existe_usuario;
	}

	public function buscarUsuario($user, $password){
		$sql_buscar = "SELECT id_usuario, usuario, contrasenia, tipo_usuario FROM usuarios";
    	$consulta_buscar = $this->BaseDatos->query($sql_buscar);
	    if($consulta_buscar->num_rows > 0){
	    	while($fila = mysqli_fetch_assoc($consulta_buscar)){
	    		if($user === $fila["usuario"] && password_verify($password, $fila['contrasenia'])){
	    			$this->id_usuario = $fila["id_usuario"];
	    			$this->completarAtributos(true, $fila['usuario'], $fila['email'], $fila['contrasenia'], $fila['nombre'], $fila['apellidos'], $fila['tipo_usuario'], $fila['fecha_nacimiento'], $fila['biografia'], $fila['foto_perfil'], $fila['direccion']);
	    		}
	    	}
	    }	
    	$consulta_buscar->free();
	}

	public function completarAtributos($existe, $usuario, $email, $contrasenia, $nombre, $apellidos, $tipo_usuario, $fecha_nacimiento, $biografia, $foto, $direccion){
			$this->existe_usuario = $existe;

			//Tabla Usuario
			$this->usuario = $usuario;
			$this->email = $email;
			$this->contrasenia = $contrasenia;
			$this->nombre = $nombre;
			$this->apellidos = $apellidos;
			$this->tipo_usuario = $tipo_usuario;

			//Tabla Info_usuario
			$this->fecha_nacimiento = $fecha_nacimiento;
			$this->biografia = $biografia;
			$this->foto_perfil = $foto;
			$this->direccion = $direccion;
	}

}

 ?> 
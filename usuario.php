<?php 

class usuario{

	private $BaseDatos;
	private $conexion; // Necesario para después poder desconectar la BD

	private $existe_usuario;

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
	public function __construct($id_usuario){
		$db = BD::getInstance('localhost', 'athenea', 'athenea', 'libreria');
		$this->conexion = $db;
		$this->BaseDatos = $db->conectar();

		$sql_usuario = "SELECT * FROM usuario U JOIN info_usuarios I ON U.id_usuario=I.id_usuario WHERE U.id_usuario=$id_usuario";
		$consulta_usuario = $this->BaseDatos->query($sql_usuario);
		if($consulta_usuario->num_rows > 0){
			$this->existe_usuario = true;

			while($fila_usuario = mysql_fetch_assoc($consulta_usuario)){
				//Tabla Usuario
				$this->usuario = $fila_usuario['usuario'];
				$this->email = $fila_usuario['email'];
				$this->contrasenia = $fila_usuario['contrasenia'];
				$this->nombre = $fila_usuario['nombre'];
				$this->apellidos = $fila_usuario['apellidos'];
				$this->tipo_usuario = $fila_usuario['tipo_usuario'];

				//Tabla Info_usuario
				$this->fecha_nacimiento = $fila_usuario['fecha_nacimiento'];
				$this->biografia = $fila_usuario['biografia'];
				$this->foto_perfil = $fila_usuario['foto_perfil'];
				$this->direccion = $fila_usuario['direccion'];
			}

		}	
		else{
			$this->existe_usuario = false;

			//Tabla Usuario
			$this->usuario = null;
			$this->email = null;
			$this->contrasenia = null;
			$this->nombre = null;
			$this->apellidos = null;
			$this->tipo_usuario = null;

			//Tabla Info_usuario
			$this->fecha_nacimiento = null;
			$this->biografia = null;
			$this->foto_perfil = null;
			$this->direccion = null;
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
	public function add_usuario($usuario, $email, $contrasenia, $nombre, $apellidos, $tipo_usuario, $fecha_nacimiento){
		$this->usuario = $usuario;
		$this->email = $email;
		$this->contrasenia = $contrasenia;
		$this->nombre = $nombre;
		$this->apellidos = $apellidos;
		$this->tipo_usuario = $tipo_usuario;
		$this->fecha_nacimiento = $fecha_nacimiento;

		$sql = "INSERT INTO usuarios VALUES (NULL, '$this->usuario', '$this->email', '$this->contrasenia', '$this->nombre', '$this->apellidos', '$this->tipo_usuario')";
		$sql2 = "INSERT INTO info_usuarios VALUES (NULL, NULL, NULL, NULL, $this->fecha_nacimiento)";
		$consulta1 = $this->BaseDatos->query($sql);
		$consulta2 = $this->BaseDatos->query($sql2);
		$consulta1->free();
		$consulta2->free();	
	}

	/*
	public function ver_usuario($id_usuario){
		$sql = "SELECT * FROM info_usuarios I WHERE I.id_usuario=$id_usuario";
		$consulta = $this->BaseDatos->query($sql);
		if($consulta->num_rows > 0){
	    	while($fila = mysqli_fetch_assoc($consulta)){
	    		echo "<br><img id=\"ver_libro\" src=\"../comun/imagenes","/",$fila['foto_perfil'],"\"></br>";
	    	}
	    }
	}
	*/

}

 ?> 
<?php 

class usuario{

	private $BaseDatos;

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
	

	public function __construct(){
		$db = BD::getInstance('localhost', 'athenea', 'athenea', 'libreria');
		$this->BaseDatos = $db->conectar();

		$this->usuario = null;
		$this->email = null;
		$this->contrasenia = null;
		$this->nombre = null;
		$this->apellidos = null;
		$this->tipo_usuario = null;
		$this->fecha_nacimiento = null;
		$this->biografia = null;
		$this->foto_perfil = null;
		$this->direccion = null;
	}

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


	public function add_usuario($usuario,$email,$contrasenia,$nombre,$apellidos,$tipo_usuario, $fecha_nacimiento){
		$this->usuario = $usuario;
		$this->email = $email;
		$this->contrasenia = $contrasenia;
		$this->nombre = $nombre;
		$this->apellidos = $apellidos;
		$this->tipo_usuario = $tipo_usuario;
		$this->fecha_nacimiento = $fecha_nacimiento;

		$sql = "INSERT INTO usuarios VALUES (NULL, '$this->usuario', '$this->email', '$this->contrasenia', '$this->nombre', '$this->apellidos', '$this->tipo_usuario')";
		$sql2 = "INSERT INTO info_usuarios VALUES (NULL, NULL, NULL, NULL, $this->fecha_nacimiento)";
		if($this->BaseDatos->query($sql) === true && $this->BaseDatos->query($sql2) === true){
			return true;
		}
		else{
			return false;
		}		
	}

	public function ver_usuario($id_usuario){
		$sql = "SELECT * FROM info_usuarios I WHERE I.id_usuario=$id_usuario";
		$consulta = $this->BaseDatos->query($sql);
		if($consulta->num_rows > 0){
	    	while($fila = mysqli_fetch_assoc($consulta)){
	    		echo "<br><img id=\"ver_libro\" src=\"../comun/imagenes","/",$fila['foto_perfil'],"\"></br>";
	    	}
	    }
	}

}

 ?> 
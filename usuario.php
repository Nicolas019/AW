<?php 

class usuario{

	private $usuario;
	private $email;
	private $contrasenia;
	private $nombre;
	private $apellidos;
	private $tipo_usuario;
	

	public function __construct($usuario,$email,$contrasenia,$nombre,$apellidos,$tipo_usuario){
		//$opcionesPorDefecto = array()
		$this->usuario = $usuario;
		$this->email = $email;
		$this->contrasenia = $contrasenia;
		$this->nombre = $nombre;
		$this->apellidos = $apellidos;
		$this->tipo_usuario = $tipo_usuario;
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


}

 ?> 
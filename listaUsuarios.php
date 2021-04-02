<?php 

class listaUsuarios{

	private $arrayUsuarios;
	private $BaseDatos;

	public function __construct($BD){
		//$opcionesPorDefecto = array()
		
		$this->BaseDatos = $BD;
		$this->arrayUsuarios = array();
		$sql = "SELECT * FROM usuarios";
        $consulta = $BD->query($sql);

        $i = 0;
        if($consulta->num_rows > 0){
	        while ($fila = mysqli_fetch_assoc($consulta)) {
	        	$user = new usuario($fila['usuario'], $fila['email'], $fila['contrasenia'], $fila['nombre'], $fila['apellidos'], $fila['tipo_usuario']);
	        	$this->arrayUsuarios[$i] = $usuario; 
	            $i++;
	        }
    	}
    	else{
    		// no hay ningún usuario
    	}
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

	public function num_Usuarios(){
		echo count($this->arrayUsuarios); 
	}

	public function add_usuario($usuario,$email,$contrasenia,$nombre,$apellidos,$tipo_usuario){
		$sql = "INSERT INTO usuarios VALUES (NULL, '$username', '$email', '$password', '$name', '$surname', '$tipo_usuario')";
		if($BaseDatos->query($sql) == true){
			$user = new usuario($usuario, $email, $contrasenia, $nombre, $apellidos, $tipo_usuario);
			$this->arrayUsuarios[count($this->arrayUsuarios)]= $user; 
		}		
	}


}

 ?> 
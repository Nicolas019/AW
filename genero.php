<?php 

class genero{
	
	private $id_Genero;
	private $descripcionG;
	private $conexion;
	private $BaseDatos;
	

	public function __construct($id_Genero){
		
		$this->conexion = BD::getInstance('localhost', 'athenea', 'athenea', 'libreria');
		$this->BaseDatos = $this->conexion->conectar();
		$sql = "SELECT * FROM genero G WHERE G.id_Genero=$id_Genero";
    	$consulta = $this->BaseDatos->query($sql);
    	if($consulta->num_rows > 0){
        	$fila = mysqli_fetch_assoc($consulta);
			$this->descripcionG = $fila['descripcionG'];
        	$this->id_Genero = $id_Genero;
        }
        $consulta->free();
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

	public function desconectarBD(){
		$this->conexion->desconectar($this->BaseDatos);
	}
}

 ?>
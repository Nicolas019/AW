<?php 

class autor{
	
	private $id_Autor;
	private $descripcionA;
	private $conexion;
	private $baseDatos;
	

	public function __construct($id_Autor){
		
		$this->conexion = BD::getInstance('localhost', 'athenea', 'athenea', 'libreria');
		$this->BaseDatos = $this->conexion->conectar();
		$sql = "SELECT * FROM autor A WHERE A.id_Autor = $id_Autor";
    	$consulta = $this->BaseDatos->query($sql);
    	if($consulta->num_rows > 0){
        	$fila = mysqli_fetch_assoc($consulta)
			$this->descripcionA = $fila['descripcionA'];
        	$this->id_Autor = $id_Autor;
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


}

 ?>
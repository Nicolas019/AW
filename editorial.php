<?php 

class editorial{
	
	private $id_Editorial;
	private $descripcionE;
	private $conexion;
	private $BaseDatos;
	

	public function __construct($id_Editorial){
		
		$this->conexion = BD::getInstance('localhost', 'athenea', 'athenea', 'libreria');
		$this->BaseDatos = $this->conexion->conectar();
		$sql = "SELECT * FROM editorial E WHERE E.id_Editorial=$id_Editorial";
    	$consulta = $this->BaseDatos->query($sql);
    	if($consulta->num_rows > 0){
        	$fila = mysqli_fetch_assoc($consulta);
			$this->descripcionE = $fila['descripcionE'];
        	$this->id_Editorial = $id_Editorial;
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
public static function getEditoriales(){

        $sql = "SELECT * FROM editorial";

        $conexion = BD::getInstance('localhost', 'athenea', 'athenea', 'libreria');
        $BaseDatos = $conexion->conectar();
        $consulta = $BaseDatos->query($sql);

        $arrayEditoriales = array();

        if($consulta->num_rows > 0){
            while ($fila = mysqli_fetch_assoc($consulta)) {

                $arrayEditoriales[$fila['id_Editorial']] = $fila['descripcionE'];

            }
            $consulta->free();
        }

        $conexion->desconectar($BaseDatos);

        return $arrayEditoriales;
    }

}

 ?>
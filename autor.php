<?php 

class autor{
	
	private $id_Autor;
	private $descripcionA;
	private $conexion;
	private $BaseDatos;
	

	public function __construct($id_Autor){
		
		$this->conexion = BD::getInstance('localhost', 'athenea', 'athenea', 'libreria');
		$this->BaseDatos = $this->conexion->conectar();
		$sql = "SELECT * FROM autor A WHERE A.id_Autor = $id_Autor";

    	$consulta = $this->BaseDatos->query($sql);
    	if($consulta->num_rows > 0){
        	$fila = mysqli_fetch_assoc($consulta);
			$this->descripcionA = $fila['descripcionA'];
        	$this->id_Autor = $id_Autor;
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

	public static function buscar($busqueda){


		$sql = "SELECT * FROM autor A  WHERE A.descripcionA LIKE \"%$busqueda%\"";


	
        $conexion = BD::getInstance('localhost', 'athenea', 'athenea', 'libreria');
		$BaseDatos = $conexion->conectar();
		$consulta = $BaseDatos->query($sql);

		$arrayAutores = array();

		if($consulta->num_rows > 0){
	        while ($fila = mysqli_fetch_assoc($consulta)) {
	        	
	        	$arrayAutores[] = $fila['id_Autor'];
	           
	        }
	        $consulta->free();
    	}

    	$conexion->desconectar($BaseDatos);

    	return $arrayAutores;

	}
public static function crearAutor($nombreAutor){

		$sql= "INSERT INTO autor (descripcionA) VALUES ('$nombreAutor')";

		echo $sql;

		$conexion = BD::getInstance('localhost', 'athenea', 'athenea', 'libreria');
		$BaseDatos = $conexion->conectar();
		 $echo="";
		if($BaseDatos->query($sql) === TRUE){
			$echo .="Nuevo autor creado";
		}else{
			$echo .="ERROR al crear el libro";
		}

		$conexion->desconectar($BaseDatos);

		return $echo;
}

public static function getAutores(){

        $sql = "SELECT * FROM autor";

        $conexion = BD::getInstance('localhost', 'athenea', 'athenea', 'libreria');
        $BaseDatos = $conexion->conectar();
        $consulta = $BaseDatos->query($sql);

        $arrayAutores = array();

        if($consulta->num_rows > 0){
            while ($fila = mysqli_fetch_assoc($consulta)) {

                $arrayAutores[$fila['id_Autor']] = $fila['descripcionA'];

            }
            $consulta->free();
        }

        $conexion->desconectar($BaseDatos);

        return $arrayAutores;
    }
}


 ?>
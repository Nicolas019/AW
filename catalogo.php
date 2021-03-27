<?php 

class catalogo{
	
	private $arrayLibros;
	private $BaseDatos;

	public function __construct($BD){
		//$opcionesPorDefecto = array()
		
		$this->BaseDatos = $BD;
		$this->arrayLibros = array();
		$sql = "SELECT * FROM libro";
        $consulta = $BD->query($sql);


        if($consulta->num_rows > 0){
	        while ($fila = mysqli_fetch_assoc($consulta)) {
	        	
	        	$libro = new libro($fila['titulo'], $fila['id_Autor'], $fila['valoracion'], $fila['id_Genero']);
	            $this->arrayLibros[$fila['titulo']]= $libro;
	            
	        }
    	}
    	else{
    		echo "No hay ningún libro";
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

	public function ordenarPorVentas(){



	}

	public function ordenarPorAutor(){

		$sql = "SELECT titulo, A.descripcionA FROM libro L JOIN autor A ON L.id_Autor = A.id_Autor ORDER BY L.id_Autor ASC";
        $consulta = $this->BaseDatos->query($sql);


        if($consulta->num_rows > 0){
	        while ($fila = mysqli_fetch_assoc($consulta)) {
	        	
	        	echo $fila['titulo'], " ", $fila['descripcionA'], "</br>";
	            
	        }
    	}
    	else{
    		echo "No hay ningún libro";
    	}


	}

	public function mostrarPorAutor($Autor){

		foreach ($this->arrayLibros as $key => $value) {
			if($value->autor == $Autor){
				echo $valor->titulo, " ", $valor->autor;
			}
		}

	}

	public function mostrarPorGenero($Genero){

		foreach ($this->arrayLibros as $key => $value) {
			if($value->genero == $Genero){
				echo $valor->titulo, " ", $valor->genero;
			}
		}

	}


	public function ordenarPorValoracion(){



	}

	public function ordenarPorGenero(){

		$sql = "SELECT titulo, G.descripcionG FROM libro L JOIN genero G ON L.id_Genero = G.id_Genero ORDER BY L.id_Genero ASC";
        $consulta = $this->BaseDatos->query($sql);


        if($consulta->num_rows > 0){
	        while ($fila = mysqli_fetch_assoc($consulta)) {
	        	
	        	echo $fila['titulo'], " ", $fila['descripcionG'], "</br>";
	            
	        }
    	}
    	else{
    		echo "No hay ningún libro";
    	}

	}

	public function mostrarArray(){

		foreach ($this->arrayLibros as $clave => $valor) {
			echo $valor->valoracion," ", $valor->titulo, " </br>";
		}

	}
}



 ?>

<?php 

class catalogo{
	
	private $arrayLibros;
	private $BD;

	public function __construct($BD){
		//$opcionesPorDefecto = array()
		
		 if ($BD->connect_error) {
		 	echo "menuda mierda";
		 }
		$this->arrayLibros = array(
			'El camino de los reyes' => new libro("El camino de los reyes","BS",9,"Fantasia"),
		);
		$sql = "SELECT * FROM libro";
        $consulta = $BD->query($sql);

        if($consulta == null){
        	echo "menuda mierda1";
        }

        if($consulta->num_rows > 0){
	        while ($fila = mysqli_fetch_assoc($consulta)) {
	        	echo $fila['titulo'];
	            $arrayLibros[$fila['titulo']]= new libro($fila['titulo'], $fila['id_Autor'], $fila['valoracion'], $fila['id_Genero']);
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

	public function ordenarPorGenero($genero){


	}

	public function mostrarArray(){

		foreach ($this->arrayLibros as $clave => $valor) {
			echo $valor->valoracion," ", $valor->titulo;
		}

	}
}



 ?>

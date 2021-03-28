<?php 

class catalogo{
	
	private $arrayLibros;

	public function __construct(){
		//$opcionesPorDefecto = array()
		$this->arrayLibros = array(
			'El camino de los reyes' => new libro("El camino de los reyes","BS",9,"Fantasia"),
		);
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

<?php 

class libro{
	
	private $autor;
	private $titulo;
	private $valoracion;
	private $genero;

	public function __construct($titulo,$autor,$valoracion,$genero){
		//$opcionesPorDefecto = array()
		$this->titulo= &titulo;
		$this->autor = &autor;
		$this->valoracion = &autor;
		$this->genero = &autor;
	}

	public function __get($property){
    if(property_exists($this, $property)) {
        return $this->$property;
    }
    public function __set($property, $value){
    if(property_exists($this, $property)) {
        $this->$property = $value;
    }
	}
}

}

 ?>

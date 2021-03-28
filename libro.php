<?php 

class libro{
	
	private $autor;
	private $titulo;
	private $valoracion;
	private $genero;

	public function __construct($titulo,$autor,$valoracion,$genero){
		//$opcionesPorDefecto = array()
		$this->titulo= $titulo;
		$this->autor = $autor;
		$this->valoracion = $valoracion;
		$this->genero = $genero;
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

	public function suma_ventas($num){
		$this->ventas = $this->ventas + $num;
	}

	public function valorar($valoracion){
		$op1= ($this->valoracion* $num_valoracion + $valoracion)/($num_valoracion +1);
		$this->valoracion=$op1;
		$num_valoracion ++;
	}
}



 ?>

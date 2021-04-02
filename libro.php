<?php 

class libro{
	
	private $autor;
	private $titulo;
	private $valoracion;
	private $genero;
	private $editorial;
	private $precio;
	private $numPag;
	private $sinopsis;
	private $ruta_img;
	private $numVentas;
	private $fecha;

	public function __construct($titulo, $autor, $genero, $editorial, $precio, $numPag, $sinopsis, $valoracion, $ruta_img, $numVentas, $fecha){
		//$opcionesPorDefecto = array()
		$this->titulo= $titulo;
		$this->autor = $autor;
		$this->valoracion = $valoracion;
		$this->genero = $genero;
		$this->editorial= $editorial;
		$this->precio = $precio;
		$this->numPag = $numPag;
		$this->sinopsis = $sinopsis;
		$this->ruta_img = $ruta_img;
		$this->numVentas = $numVentas;
		$this->fecha = $fecha;
		
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

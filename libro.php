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
		$this->titulo = $titulo;
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

	public function estrellas_valoracion(){
		$numStars = 0;
    	if($this->valoracion <= 2){
    		$numStars = 1;
    	}
    	else if($this->valoracion > 2 && $this->valoracion <= 4){
    		$numStars = 2;
    	}
    	else if($this->valoracion > 4 && $this->valoracion <= 6){
    		$numStars = 3;
    	}
    	else if($this->valoracion > 6 && $this->valoracion <= 8){
    		$numStars = 4;
    	}
    	else if($this->valoracion > 8 && $this->valoracion <= 10){
    		$numStars = 5;
    	}
    	else{
    		$numStars = 0;
    	}

    	$i = 0;
    	while($numStars > $i){
    		echo "<img id=\"valor\" src=\"../comun/imagenes","/","star.png","\">";
    		$i = $i + 1;
    	}
	}

	public function ver_libro(){
    	echo "<h2>".$this->titulo."</h2>";
    	echo "<h3>".$this->autor."</h3>";
    	echo "<br>Valoración: ".$this->valoracion."</br>";
    	$this->estrellas_valoracion();
    	echo "<br>Género: ".$this->genero."</br>";
    	echo "<br>Editorial: ".$this->editorial."</br>";
    	echo "<br>Número de páginas: ".$this->numPag."</br>";
    	if($this->fecha !== NULL){
    		echo "<br>Fecha de lanzamiento: ".$this->fecha."</br>";
    	}
    	echo "<br><img id=\"ver_libro\" src=\"../comun/imagenes","/",$this->ruta_img,"\"></br>";
    	echo "<br>Sinopsis: ".$this->sinopsis."</br>";
	}

	public function ver_comentario($usuario, $tipo_usuario, $descripcion){
		echo "<br>@".$usuario." (".$tipo_usuario."): ";
		echo $descripcion."</br>";
	}

}

?>
<?php 

class libroEnVenta extends libro{
	
	private $BaseDatos;
	private $conexion; // Necesario para después poder desconectar la BD

	private $almacen;
	private $comentarios;
	
	/* CONSTRUCTOR */
	public function __construct($id){
		parent::__construct($id);

		$db = BD::getInstance('localhost', 'athenea', 'athenea', 'libreria');
		$this->BaseDatos = $db->conectar();

		$this->almacen = null;
		$this->comentarios = null;
	}

	/* FUNCIONES GENERALES */
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

	/* ALMACEN */
	public function hay_stock_libroEnVenta(){
		$this->almacen = new almacen(parent::__get($id_Libro), parent::__get($precio));

		$hay_stock = $this->almacen->hay_stock_libro();

		$this->almacen->desconectarBD();
		$this->almacen = null;

		return $hay_stock;
	}

	public function restar_stock_libroEnVenta($precio){
		$this->almacen = new almacen(parent::__get($id_Libro), parent::__get($precio));

		$this->almacen->restar_stock_libro($precio);

		$this->almacen->desconectarBD();
		$this->almacen = null;

	}

	public function precio_libroEnVenta($estado){
		$this->almacen = new almacen(parent::__get($id_Libro), parent::__get($precio));

		$precio_libro = $this->almacen->precio_libro($estado); //con esta función sabmemos también si hay stock para este estado (nuevo), ya que si no hay stock entonces $precio_libro será 0.

		$this->almacen->desconectarBD();
		$this->almacen = null;

		return $precio_libro;
	}

	/* COMENTARIOS */
	public function descripcion_comentarios_libroEnVenta(){
		$this->comentarios = new comentarios(parent::__get($id_libro));

		$array = $this->comentarios->__get($arrayComentarios);

		$this->comentarios->desconectarBD();
		$this->comentarios = null;

		return $array;
	}

	public function usuarios_comentarios_libroEnVenta(){
		$this->comentarios = new comentarios(parent::__get($id_libro));

		$array = $this->comentarios->__get($arrayUsuarios);

		$this->comentarios->desconectarBD();
		$this->comentarios = null;

		return $array;
	}

	public function num_comentarios_libroEnVenta(){
		$this->comentarios = new comentarios(parent::__get($id_libro));

		$num = $this->comentarios->__get($num_comentarios);

		$this->comentarios->desconectarBD();
		$this->comentarios = null;

		return $num;
	}

	/* OTRAS FUNCIONES */
	// esta función podría estar mejor en libro.php
	public function estrellas_valoracion(){
		$numStars = 0;
    	if(parent::__get($valoracion) <= 2){
    		$numStars = 1;
    	}
    	else if(parent::__get($valoracion) > 2 && parent::__get($valoracion) <= 4){
    		$numStars = 2;
    	}
    	else if(parent::__get($valoracion) > 4 && parent::__get($valoracion) <= 6){
    		$numStars = 3;
    	}
    	else if(parent::__get($valoracion) > 6 && parent::__get($valoracion) <= 8){
    		$numStars = 4;
    	}
    	else if(parent::__get($valoracion)> 8 && parent::__get($valoracion) <= 10){
    		$numStars = 5;
    	}
    	else{
    		$numStars = 0;
    	}

    	return $numStars;
	}

	/*
	public function ver_libro(){
    	echo "<h2>".$this->titulo."</h2>";
    	echo "<h3>".$this->autor."</h3>";
    	echo "<br>Valoración: ".$this->valoracion."</br>";
    	$numStars = $this->estrellas_valoracion();
    	$i = 0;
    	while($numStars > $i){
    		echo "<img id=\"valor\" src=\"../comun/imagenes","/","star.png","\">";
    		$i = $i + 1;
    	}

    	echo "<br>Género: ".$this->genero."</br>";
    	echo "<br>Editorial: ".$this->editorial."</br>";
    	echo "<br>Número de páginas: ".$this->numPag."</br>";
    	if($this->fecha !== NULL){
    		echo "<br>Fecha de lanzamiento: ".$this->fecha."</br>";
    	}
    	echo "<br><img id=\"ver_libro\" src=\"../comun/imagenes","/",$this->ruta_img,"\"></br>";
    	echo "<br>Sinopsis: ".$this->sinopsis."</br>";
	}
	*/

}

?>
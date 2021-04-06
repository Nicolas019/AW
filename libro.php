<?php 

class libro{
	
	private $BaseDatos;
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

	public function __construct($id){
		
		$db = BD::getInstance('localhost', 'athenea', 'athenea', 'libreria');
		$this->BaseDatos = $db->conectar();
		$sql = "SELECT L.*, A.descripcionA, G.descripcionG, E.descripcionE FROM libro L JOIN autor A ON L.id_Autor=A.id_Autor JOIN genero G ON G.id_Genero=L.id_Genero JOIN editorial E ON L.id_Editorial=E.id_Editorial WHERE L.id_Libro=$id";
    	$consulta = $this->BaseDatos->query($sql);
    	if($consulta->num_rows > 0){
        	while($fila = mysqli_fetch_assoc($consulta)){
				$this->titulo = $fila['titulo'];
				$this->autor = $fila['descripcionA'];
				$this->valoracion = $fila['valoracion'];
				$this->genero = $fila['descripcionG'];
				$this->editorial= $fila['descripcionE'];
				$this->precio = $fila['precio'];
				$this->numPag = $fila['numero_Paginas'];
				$this->sinopsis = $fila['sinopsis'];
				$this->ruta_img = $fila['ruta_imagen'];
				$this->numVentas = $fila['NumVentas'];
				$this->fecha = $fila['fecha_Lanzamiento'];	
        	}
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


}

?>
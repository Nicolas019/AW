<?php 

require_once '../comun/autor.php';
require_once '../comun/genero.php';
require_once '../comun/editorial.php';

class libro{
	
	private $BaseDatos;
	private $conexion;

	protected $id_Libro;
	protected $autor;
	protected $titulo;
	protected $valoracion;
	protected $genero;
	protected $editorial;
	protected $precio;
	protected $numPag;
	protected $sinopsis;
	protected $ruta_imagen;
	protected $numVentas;
	protected $fecha;
	protected $numStars;

	/* CONSTRUCTOR */
	public function __construct($id){
		
		$this->conexion = BD::getInstance('localhost', 'athenea', 'athenea', 'libreria');
		$this->BaseDatos = $this->conexion->conectar();
		$sql = "SELECT L.* FROM libro L WHERE L.id_Libro=$id";
    	$consulta = $this->BaseDatos->query($sql);
    	if($consulta->num_rows > 0){

    		$fila = mysqli_fetch_assoc($consulta);
			$this->titulo = $fila['titulo'];
			$this->valoracion = $fila['valoracion'];
			$this->precio = $fila['precio'];
			$this->numPag = $fila['numero_Paginas'];
			$this->sinopsis = $fila['sinopsis'];
			$this->ruta_imagen = $fila['ruta_imagen'];
			$this->numVentas = $fila['NumVentas'];
			$this->fecha = $fila['fecha_Lanzamiento'];
			$this->id_Libro = $id;

			//Obtener Autor
			$autor = new autor($fila['id_Autor']);
			$this->autor = $autor->descripcionA;

			//Obtener Genero
			$genero = new genero($fila['id_Genero']);
			$this->genero = $genero->descripcionG;

			//Obtener Editorial
			$editorial = new editorial($fila['id_Editorial']);
			$this->editorial = $editorial->descripcionE;

			//Inicializar numStars
			$this->estrellas_valoracion();
		
        }
        $consulta->free();

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

	/* BIBLIOTECA */
	static public function filtros($arrayGeneros,$sentido,$orden,$precioMin,$precioMax, $numero){

		$arrayLibros = array();
		$consultaGeneros = join($arrayGeneros, ",");

		$sql = ($sentido == TRUE) ?  "SELECT * FROM libro L  WHERE L.id_Genero IN ($consultaGeneros)  AND L.precio BETWEEN $precioMin AND  $precioMax ORDER BY $orden ASC" :  "SELECT * FROM libro L WHERE L.id_Genero IN ($consultaGeneros)  AND L.precio BETWEEN $precioMin AND  $precioMax ORDER BY $orden DESC ";
	

		$conexion = BD::getInstance('localhost', 'athenea', 'athenea', 'libreria');
		$BaseDatos = $conexion->conectar();
		$consulta = $BaseDatos->query($sql);

       if($consulta->num_rows > 0){
	        while ($numero > 0 && $fila = mysqli_fetch_assoc($consulta)) {
	        	
	        	$arrayLibros[]= new libro($fila['id_Libro']);
	            $numero--;
	        }
	        $consulta->free();
    	}

    	$conexion->desconectar($BaseDatos);

    	return $arrayLibros;
	}

	static public function buscar($busqueda, $numero){ //Ordena por nº paginas el numero es para sacar x libros

 		$arrayAutores = autor::buscar($busqueda);
 		$consultaAutores=0;
 		if(!empty($arrayAutores)){
 			$consultaAutores=join($arrayAutores, ",");
 		}

		$sql = "SELECT * FROM libro L  WHERE L.titulo LIKE \"%$busqueda%\" OR L.id_Autor IN ($consultaAutores)";
		
        $conexion = BD::getInstance('localhost', 'athenea', 'athenea', 'libreria');
		$BaseDatos = $conexion->conectar();
		$consulta = $BaseDatos->query($sql);
		$arrayLibros=array();

        if($consulta->num_rows > 0){
	        while ($numero > 0 && $fila = mysqli_fetch_assoc($consulta)) {
	        	$arrayLibros[]= new libro($fila['id_Libro']);
	            $numero--;
	        }
	        $consulta->free();
    	}

    	$conexion->desconectar($BaseDatos);
    	return $arrayLibros;
	}

	static public function ordenarPor($ordenar, $numero){ //Ordena por nº de ventas 

		$sql = "SELECT * FROM libro L ORDER BY $ordenar DESC";
        $conexion = BD::getInstance('localhost', 'athenea', 'athenea', 'libreria');
		$BaseDatos = $conexion->conectar();
		$consulta = $BaseDatos->query($sql);
		$arrayLibros=array();

        if($consulta->num_rows > 0){
	        while ($numero > 0 && $fila = mysqli_fetch_assoc($consulta)) {
	        	$arrayLibros[]= new libro($fila['id_Libro']);
	            $numero--;
	        }
	        $consulta->free();
    	}
    	$conexion->desconectar($BaseDatos);
    	return $arrayLibros;
	}

	/* COMPRAR */
	public function suma_ventas($num){
		$this->numVentas = $this->numVentas + $num;
	}

	/*
	public function valorar($valoracion){
		$op1= ($this->valoracion* $num_valoracion + $valoracion)/($num_valoracion +1);
		$this->valoracion=$op1;
		$num_valoracion++;
	}
	*/

	public function estrellas_valoracion(){
		$numStars = 0;
    	if($this->valoracion <= 2){
    		$this->numStars = 1;
    	}
    	else if($this->valoracion > 2 && $this->valoracion <= 4){
    		$this->numStars = 2;
    	}
    	else if($this->valoracion > 4 && $this->valoracion <= 6){
    		$this->numStars = 3;
    	}
    	else if($this->valoracion > 6 && $this->valoracion <= 8){
    		$this->numStars = 4;
    	}
    	else if($this->valoracion > 8 && $this->valoracion <= 10){
    		$this->numStars = 5;
    	}
    	else{
    		$this->numStars = 0;
    	}

    	
	}

}

?>
<?php 

class catalogo{
	
	private static $singletonCatalogo = null;
	private $arrayLibros;
	private $conexion; // Necesario para después poder desconectar la BD
	private $BaseDatos;
	private $numeroLibros_A_Mostrar; //Numeros de libros que queremos mostrar en una página
	private $posicionArray;

	private function __construct(){
		
		//echo "Entro en el constructor de catalogo";
		$db = BD::getInstance('localhost', 'athenea', 'athenea', 'libreria');
		$this->conexion = $db;
		$this->BaseDatos = $db->conectar();


		$this->numeroLibros_A_Mostrar=5;
		$this->arrayLibros = array();
		$sql = "SELECT * FROM libro";
        $consulta = $this->BaseDatos->query($sql);
        
        if($consulta->num_rows > 0){
	        while ($fila = mysqli_fetch_assoc($consulta)) {
	        	$libro = new libro($fila['id_Libro']);
	            $this->arrayLibros[$fila['id_Libro']]= $libro;
	        }
	        $consulta->free();
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

	public function desconectarBD(){
		$this->conexion->desconectar($this->BaseDatos);
	}

	public static function getInstance(){
		if(self::$singletonCatalogo == null){
			self::$singletonCatalogo = new self();
		}
		return self::$singletonCatalogo;
		
	}

	public function filtros($arrayGeneros,$sentido,$orden,$precioMin,$precioMax){

		$sql = ($sentido == TRUE) ?  "SELECT * FROM libro L  WHERE L.id_Genero = $arrayGeneros[0] OR L.id_Genero = $arrayGeneros[1] OR L.id_Genero = $arrayGeneros[2] OR L.id_Genero = $arrayGeneros[3] OR L.id_Genero = $arrayGeneros[4] OR L.id_Genero = $arrayGeneros[5] OR L.id_Genero= $arrayGeneros[6]  AND L.precio BETWEEN $precioMin AND  $precioMax ORDER BY $orden ASC" :  "SELECT * FROM libro L WHERE L.id_Genero = $arrayGeneros[0] OR L.id_Genero = $arrayGeneros[1] OR L.id_Genero = $arrayGeneros[2] OR L.id_Genero = $arrayGeneros[3] OR L.id_Genero = $arrayGeneros[4] OR L.id_Genero = $arrayGeneros[5] OR L.id_Genero= $arrayGeneros[6]  AND L.precio BETWEEN $precioMin AND  $precioMax ORDER BY $orden DESC ";

		
		 $consulta = $this->BaseDatos->query($sql);
		 $numero = $this->numeroLibros_A_Mostrar;
        


       if($consulta->num_rows > 0){
	        while ($numero > 0 && $fila = mysqli_fetch_assoc($consulta)) {
	        	
	        	echo "<a href=\"../compra/verLibro.php?id_Libro=",$fila['id_Libro'],"\"> <img id=\"libro\" src=\"../comun/imagenes","/",$fila['ruta_imagen'],"\"> </a>";
	        	echo $fila['titulo'], "</br>";
	            $numero--;
	        }
	        $consulta->free();
    	}
    	else{
    		echo "<h3> Ningun libro cumple con los requisitos seleccionados :(</h3>";
    		
    		echo "<img id=\"nofiltro\" src=\"../comun/imagenes\busqueda_fallida.png\">";
    	}



	}

	public function buscar($busqueda){ //Ordena por nº paginas el numero es para sacar x libros

		$sql = "SELECT * FROM libro L JOIN autor A ON A.id_Autor = L.id_Autor WHERE L.titulo LIKE \"%$busqueda%\" OR A.descripcionA LIKE \"%$busqueda%\"";
	
        $consulta = $this->BaseDatos->query($sql);

        $numero = $this->numeroLibros_A_Mostrar;
        if($consulta->num_rows > 0){
	        while ($numero > 0 && $fila = mysqli_fetch_assoc($consulta)) {
	        	
	        	echo "<a href=\"../compra/verLibro.php?id_Libro=",$fila['id_Libro'],"\"> <img id=\"libro\" src=\"../comun/imagenes","/",$fila['ruta_imagen'],"\"> </a>";
	        	echo $fila['titulo'], "</br>";
	            $numero--;
	        }
	        $consulta->free();
    	}
    	else{
    		echo "No hay ningún libro";
    	}


	}

	public function ordenarPorTitulo($sentido){ //Ordena por nº de ventas el numero es para sacar x libros,

		$sql = ($sentido == TRUE) ?  "SELECT L.* FROM libro L ORDER BY titulo DESC" : "SELECT L.* FROM libro L ORDER BY titulo ASC";
        $consulta = $this->BaseDatos->query($sql);

        //$this->guardaArray($consulta); Intento de pasar de página
        $numero = $this->numeroLibros_A_Mostrar;
        $i = 0;


        if($consulta->num_rows > 0){
	        while ($this->arrayLibros[$i]!= null && $numero > 0) {
	        	
	        	echo "<a href=\"../compra/verLibro.php?id_Libro=",$fila['id_Libro'],"\"> <img id=\"libro\" src=\"../comun/imagenes","/",$this->arrayLibros[$i]->ruta_img,"\">";
	        	echo $this->arrayLibros[$i]->titulo, "</br>";
	            $numero--;
	        }
	        $consulta->free();
    	}
    	else{
    		echo "No hay ningún libro";
    	}


	}


	public function ordenarPorFecha($numero, $sentido ){ //Ordena por nº de ventas el numero es para sacar x libros

		$sql = ($sentido == TRUE) ?  "SELECT id_Libro, titulo, L.ruta_imagen FROM libro L ORDER BY fecha_Lanzamiento DESC" : "SELECT id_Libro, titulo, L.ruta_imagen FROM libro L ORDER BY fecha_Lanzamiento ASC";
        $consulta = $this->BaseDatos->query($sql);

        if($consulta->num_rows > 0){
	        while ($numero > 0 && $fila = mysqli_fetch_assoc($consulta)) {
	        	
	        	echo "<a href=\"../compra/verLibro.php?id_Libro=",$fila['id_Libro'],"\"> <img id=\"libro\" src=\"../comun/imagenes","/",$fila['ruta_imagen'],"\"> </a>";
	        	echo $fila['titulo'], "</br>";
	            $numero--;
	        }
	        $consulta->free();
    	}
    	else{
    		echo "No hay ningún libro";
    	}


	}


	public function ordenarPorVentas($sentido){ //Ordena por nº de ventas el numero es para sacar x libros

		$sql = ($sentido == TRUE) ?  "SELECT id_Libro, titulo, L.ruta_imagen FROM libro L ORDER BY NumVentas DESC" : "SELECT id_Libro, titulo, L.ruta_imagen FROM libro L ORDER BY NumVentas ASC";
        $consulta = $this->BaseDatos->query($sql);
        $numero = $this->numeroLibros_A_Mostrar;
        if($consulta->num_rows > 0){
	        while ($numero > 0 && $fila = mysqli_fetch_assoc($consulta)) {
	        	
	        	echo "<a href=\"../compra/verLibro.php?id_Libro=",$fila['id_Libro'],"\"> <img id=\"libro\" src=\"../comun/imagenes","/",$fila['ruta_imagen'],"\"> </a>";
	        	//echo $fila['titulo'], "</br>";
	            $numero--;
	        }
	        $consulta->free();
    	}
    	else{
    		echo "No hay ningún libro";
    	}


	}

	public function ordenarPorPaginas($numero, $sentido){ //Ordena por nº paginas el numero es para sacar x libros

		$sql = ($sentido == TRUE) ? "SELECT id_Libro, titulo, L.ruta_imagen FROM libro L ORDER BY numero_Paginas DESC": "SELECT id_Libro, titulo, L.ruta_imagen FROM libro L ORDER BY numero_Paginas ASC";
        $consulta = $this->BaseDatos->query($sql);

        if($consulta->num_rows > 0){
	        while ($numero > 0 && $fila = mysqli_fetch_assoc($consulta)) {
	        	
	        	echo "<a href=\"../compra/verLibro.php?id_Libro=",$fila['id_Libro'],"\"> <img id=\"libro\" src=\"../comun/imagenes","/",$fila['ruta_imagen'],"\"> </a>";
	        	echo $fila['titulo'], "</br>";
	            $numero--;
	        }
	        $consulta->free();
    	}
    	else{
    		echo "No hay ningún libro";
    	}


	}


	public function ordenarPorAutor($numero, $sentido){

		$sql = ($sentido == TRUE) ? "SELECT id_Libro, titulo, A.descripcionA, ruta_imagen FROM libro L JOIN autor A ON L.id_Autor = A.id_Autor ORDER BY L.id_Autor DESC" : "SELECT id_Libro, titulo, A.descripcionA, ruta_imagen FROM libro L JOIN autor A ON L.id_Autor = A.id_Autor ORDER BY L.id_Autor ASC";
        $consulta = $this->BaseDatos->query($sql);


        if($numero > 0 && $consulta->num_rows > 0){
	        while ($fila = mysqli_fetch_assoc($consulta)) {
	        	
	        	echo "<a href=\"../compra/verLibro.php?id_Libro=",$fila['id_Libro'],"\"> <img id=\"libro\" src=\"../comun/imagenes","/",$fila['ruta_imagen'],"\"> </a>";
	        	echo $fila['titulo'], "</br>";
	            $numero--;
	        }
	        $consulta->free();
    	}
    	else{
    		echo "No hay ningún libro";
    	}


	}


	public function ordenarPorValoracion($sentido){
		$sql = ($sentido == TRUE) ? "SELECT id_Libro, titulo, valoracion, ruta_imagen FROM libro L  ORDER BY L.valoracion DESC" : "SELECT id_Libro, titulo, valoracion, ruta_imagen FROM libro L  ORDER BY L.valoracion ASC";
		        

		$consulta = $this->BaseDatos->query($sql);
		$numero = $this->numeroLibros_A_Mostrar;
		if($consulta->num_rows > 0){

		  while ($numero>0 && $fila = mysqli_fetch_assoc($consulta) ) {
		        	
		  	$numero--;
		  	echo "<a href=\"../compra/verLibro.php?id_Libro=",$fila['id_Libro'],"\"> <img id=\"libro\" src=\"../comun/imagenes","/",$fila['ruta_imagen'],"\"> </a>";
		       
		  }
		  $consulta->free();
	    }
    	else{
    		echo "No hay ningún libro";
    	}


	}



	public function ordenarPorGenero($numero, $sentido){

		$sql = ($sentido == TRUE) ? "SELECT id_Libro, titulo, G.descripcionG, ruta_imagen FROM libro L JOIN genero G ON L.id_Genero = G.id_Genero ORDER BY L.id_Genero DESC": "SELECT id_Libro, titulo, G.descripcionG, ruta_imagen FROM libro L JOIN genero G ON L.id_Genero = G.id_Genero ORDER BY L.id_Genero ASC";
        $consulta = $this->BaseDatos->query($sql);


        if($consulta->num_rows > 0){

	        while ($numero > 0 && $fila = mysqli_fetch_assoc($consulta)) {
	        	
	        	echo "<a href=\"../compra/verLibro.php?id_Libro=",$fila['id_Libro'],"\"> <img id=\"libro\" src=\"../comun/imagenes","/",$fila['ruta_imagen'],"\"> </a>";
	            $numero--;
	        }
	        $consulta->free();
    	}
    	else{
    		echo "No hay ningún libro";
    	}

	}

	public function buscaAutor($Autor){

		$sql = "SELECT id_Libro, titulo, A.descripcionA, L.ruta_imagen FROM libro L JOIN autor A ON L.id_Autor = A.id_Autor WHERE L.id_Autor = $Autor";
        $consulta = $this->BaseDatos->query($sql);

        if($consulta->num_rows > 0){
	        while ($fila = mysqli_fetch_assoc($consulta)) {
	        	
	        	echo "<a href=\"../compra/verLibro.php?id_Libro=",$fila['id_Libro'],"\"> <img id=\"libro\" src=\"../comun/imagenes","/",$fila['ruta_imagen'],"\"> </a>";
	        	echo $fila['titulo'], "</br>";
	            
	        }
	        $consulta->free();
    	}
    	else{
    		echo "No hay ningún libro";
    	}


	}



	public function mostrarPorAutor($Autor){//Deprecated function

		foreach ($this->arrayLibros as $key => $value) {
			if($value->autor == $Autor){
				echo $valor->titulo, " ", $valor->autor;
			}
		}

	}

	public function mostrarPorGenero($Genero){//Deprecated function

		foreach ($this->arrayLibros as $key => $value) {
			if($value->genero == $Genero){
				echo $valor->titulo, " ", $valor->genero;
			}
		}

	}


	public function buscarGenero($genero){

		$sql = "SELECT id_Libro, titulo, ruta_imagen FROM libro L JOIN genero G ON L.id_Genero = G.id_Genero WHERE G.id_Genero = $genero";
        $consulta = $this->BaseDatos->query($sql);


        if($consulta->num_rows > 0){
	        while ($fila = mysqli_fetch_assoc($consulta)) {
	        	
	        	echo "<a href=\"../compra/verLibro.php?id_Libro=",$fila['id_Libro'],"\"> <img id=\"libro\" src=\"../comun/imagenes","/",$fila['ruta_imagen'],"\"> </a>";
	        	echo $fila['titulo'], "</br>";
	            
	        }
	        $consulta->free();
    	}
    	else{
    		echo "No hay ningún libro";
    	}

	}

	public function mostrarNovedades($numero){

		$sql = "SELECT id_Libro, titulo, L.ruta_imagen FROM libro L ORDER BY fecha_Lanzamiento DESC";
        $consulta = $this->BaseDatos->query($sql);

        if($consulta->num_rows > 0){
	        while ($numero > 0 && $fila = mysqli_fetch_assoc($consulta)) {
	        	
	        	echo "<a href=\"../compra/verLibro.php?id_Libro=",$fila['id_Libro'],"\"> <img id=\"libro\" src=\"../comun/imagenes","/",$fila['ruta_imagen'],"\"> </a>";
	            $numero--;
	        }
	        $consulta->free();
    	}
    	else{
    		echo "No hay ningún libro";
    	}


	}

	public function guardaArray($consulta){ //Guardar la consulta en un array para poder recorrerla

		$this->posicionArray = 0;
        $posicion = 0;
        $this->arrayLibros = array();

        if($consulta->num_rows > 0){
	        while ($fila = mysqli_fetch_assoc($consulta)) {
	        	
	        	
	        	$libro = new libro($fila['titulo'], $fila['id_Autor'], $fila['id_Genero'],  $fila['id_Editorial'],  $fila['precio'],  $fila['numero_Paginas'], $fila['sinopsis'], $fila['valoracion'], $fila['ruta_imagen'], $fila['NumVentas'], $fila['fecha_Lanzamiento']);

	            $this->arrayLibros[$posicion]= $libro;
	            $posicion++;
	            
	            
	        }
	        $consulta->free();
    	}
    	else{
    		echo "No hay ningún libro";
    	}

	}


	public function mostrarArray(){//Deprecated function

		foreach ($this->arrayLibros as $clave => $valor) {
			echo $valor->valoracion," ", $valor->titulo, " </br>";
		}

	}

	public function paginaAnterior(){
		
		$numero = $this->numeroLibros_A_Mostrar;
		if(($this->posicionArray - $numero) > 0){
			$this->posicionArray = $this->posicionArray - $numero;
		}
		else{
			$this->posicionArray = 0;
		}
		

		while ($this->arrayLibros[$this->posicionArray]!= null && $numero > 0) {
	        	
	        echo " <img id=\"libro\" src=\"../comun/imagenes","/",$this->arrayLibros[$i]->ruta_img,"\">";
	        echo $this->arrayLibros[$i]->titulo, "</br>";
	        $this->posicionArray++;
	        $numero--;
	    }
	}

	public function paginaSiguiente(){
		
		
		$numero = $this->numeroLibros_A_Mostrar;

		while ($this->arrayLibros[$this->posicionArray]!= null && $numero > 0) {
	        	
	        echo " <img id=\"libro\" src=\"../comun/imagenes","/",$this->arrayLibros[$i]->ruta_img,"\">";
	        echo $this->arrayLibros[$i]->titulo, "</br>";
	        $this->posicionArray++;
	        $numero--;
	    }
	}
}



 ?>

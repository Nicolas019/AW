<?php 

class catalogo{
	
	private $arrayLibros;
	private $BaseDatos;

	public function __construct($BD){
		//$opcionesPorDefecto = array()
		
		$this->BaseDatos = $BD;
		$this->arrayLibros = array();
		$sql = "SELECT * FROM libro";
        $consulta = $BD->query($sql);


        if($consulta->num_rows > 0){
	        while ($fila = mysqli_fetch_assoc($consulta)) {
	        	
	        	$libro = new libro($fila['titulo'], $fila['id_Autor'], $fila['valoracion'], $fila['id_Genero']);
	            $this->arrayLibros[$fila['titulo']]= $libro;
	            
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

	public function ordenarPorTitulo($numero, $sentido ){ //Ordena por nº de ventas el numero es para sacar x libros

		$sql = ($sentido == TRUE) ?  "SELECT titulo, L.ruta_imagen FROM libro L ORDER BY titulo DESC" : "SELECT titulo, L.ruta_imagen FROM libro L ORDER BY titulo ASC";
        $consulta = $this->BaseDatos->query($sql);

        if($consulta->num_rows > 0){
	        while ($numero > 0 && $fila = mysqli_fetch_assoc($consulta)) {
	        	
	        	echo " <img id=\"libro\" src=\"imagenes","/",$fila['ruta_imagen'],"\">";
	        	echo $fila['titulo'], "</br>";
	            $numero--;
	        }
    	}
    	else{
    		echo "No hay ningún libro";
    	}


	}


	public function ordenarPorFecha($numero, $sentido ){ //Ordena por nº de ventas el numero es para sacar x libros

		$sql = ($sentido == TRUE) ?  "SELECT titulo, L.ruta_imagen FROM libro L ORDER BY fecha_Lanzamiento DESC" : "SELECT titulo, L.ruta_imagen FROM libro L ORDER BY fecha_Lanzamiento ASC";
        $consulta = $this->BaseDatos->query($sql);

        if($consulta->num_rows > 0){
	        while ($numero > 0 && $fila = mysqli_fetch_assoc($consulta)) {
	        	
	        	echo " <img id=\"libro\" src=\"imagenes","/",$fila['ruta_imagen'],"\">";
	        	echo $fila['titulo'], "</br>";
	            $numero--;
	        }
    	}
    	else{
    		echo "No hay ningún libro";
    	}


	}


	public function ordenarPorVentas($numero, $sentido ){ //Ordena por nº de ventas el numero es para sacar x libros

		$sql = ($sentido == TRUE) ?  "SELECT titulo, L.ruta_imagen FROM libro L ORDER BY NumVentas DESC" : "SELECT titulo, L.ruta_imagen FROM libro L ORDER BY NumVentas ASC";
        $consulta = $this->BaseDatos->query($sql);

        if($consulta->num_rows > 0){
	        while ($numero > 0 && $fila = mysqli_fetch_assoc($consulta)) {
	        	
	        	echo " <img id=\"libro\" src=\"imagenes","/",$fila['ruta_imagen'],"\">";
	        	echo $fila['titulo'], "</br>";
	            $numero--;
	        }
    	}
    	else{
    		echo "No hay ningún libro";
    	}


	}

	public function ordenarPorPaginas($numero, $sentido){ //Ordena por nº paginas el numero es para sacar x libros

		$sql = ($sentido == TRUE) ? "SELECT titulo, L.ruta_imagen FROM libro L ORDER BY numero_Paginas DESC": "SELECT titulo, L.ruta_imagen FROM libro L ORDER BY numero_Paginas ASC";
        $consulta = $this->BaseDatos->query($sql);

        if($consulta->num_rows > 0){
	        while ($numero > 0 && $fila = mysqli_fetch_assoc($consulta)) {
	        	
	        	echo " <img id=\"libro\" src=\"imagenes","/",$fila['ruta_imagen'],"\">";
	        	echo $fila['titulo'], "</br>";
	            $numero--;
	        }
    	}
    	else{
    		echo "No hay ningún libro";
    	}


	}


	public function ordenarPorAutor($numero, $sentido){

		$sql = ($sentido == TRUE) ? "SELECT titulo, A.descripcionA, ruta_imagen FROM libro L JOIN autor A ON L.id_Autor = A.id_Autor ORDER BY L.id_Autor DESC" : "SELECT titulo, A.descripcionA, ruta_imagen FROM libro L JOIN autor A ON L.id_Autor = A.id_Autor ORDER BY L.id_Autor ASC";
        $consulta = $this->BaseDatos->query($sql);


        if($numero > 0 && $consulta->num_rows > 0){
	        while ($fila = mysqli_fetch_assoc($consulta)) {
	        	
	        	echo " <img id=\"libro\" src=\"imagenes","/",$fila['ruta_imagen'],"\">";
	        	echo $fila['titulo'], "</br>";
	            $numero--;
	        }
    	}
    	else{
    		echo "No hay ningún libro";
    	}


	}


	public function ordenarPorValoracion($numero, $sentido){
		$sql = ($sentido == TRUE) ? "SELECT titulo, valoracion, ruta_imagen FROM libro L  ORDER BY L.valoracion DESC" : "SELECT titulo, valoracion, ruta_imagen FROM libro L  ORDER BY L.valoracion ASC";
		        

		$consulta = $this->BaseDatos->query($sql);

		if($consulta->num_rows > 0){

		  while ($numero>0 && $fila = mysqli_fetch_assoc($consulta) ) {
		        	
		  	$numero--;
		  	echo " <img id=\"libro\" src=\"imagenes","/",$fila['ruta_imagen'],"\">";
		       
		  }
	    }
    	else{
    		echo "No hay ningún libro";
    	}


	}



	public function ordenarPorGenero($numero, $sentido){

		$sql = ($sentido == TRUE) ? "SELECT titulo, G.descripcionG, ruta_imagen FROM libro L JOIN genero G ON L.id_Genero = G.id_Genero ORDER BY L.id_Genero DESC": "SELECT titulo, G.descripcionG, ruta_imagen FROM libro L JOIN genero G ON L.id_Genero = G.id_Genero ORDER BY L.id_Genero ASC";
        $consulta = $this->BaseDatos->query($sql);


        if($consulta->num_rows > 0){

	        while ($numero > 0 && $fila = mysqli_fetch_assoc($consulta)) {
	        	
	        	echo " <img id=\"libro\" src=\"imagenes","/",$fila['ruta_imagen'],"\">";
	            $numero--;
	        }
    	}
    	else{
    		echo "No hay ningún libro";
    	}

	}

	public function buscaAutor($Autor){

		$sql = "SELECT titulo, A.descripcionA, L.ruta_imagen FROM libro L JOIN autor A ON L.id_Autor = A.id_Autor WHERE L.id_Autor = $Autor";
        $consulta = $this->BaseDatos->query($sql);

        if($consulta->num_rows > 0){
	        while ($fila = mysqli_fetch_assoc($consulta)) {
	        	
	        	echo " <img id=\"libro\" src=\"imagenes","/",$fila['ruta_imagen'],"\">";
	        	echo $fila['titulo'], "</br>";
	            
	        }
    	}
    	else{
    		echo "No hay ningún libro";
    	}


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


		public function buscarGenero($genero){

		$sql = "SELECT titulo, ruta_imagen FROM libro L JOIN genero G ON L.id_Genero = G.id_Genero WHERE G.id_Genero = $genero";
        $consulta = $this->BaseDatos->query($sql);


        if($consulta->num_rows > 0){
	        while ($fila = mysqli_fetch_assoc($consulta)) {
	        	
	        	echo " <img id=\"libro\" src=\"imagenes","/",$fila['ruta_imagen'],"\">";
	        	echo $fila['titulo'], "</br>";
	            
	        }
    	}
    	else{
    		echo "No hay ningún libro";
    	}

	}

	public function mostrarNovedades($numero){

		$sql = "SELECT titulo, L.ruta_imagen FROM libro L ORDER BY fecha_Lanzamiento DESC";
        $consulta = $this->BaseDatos->query($sql);

        if($consulta->num_rows > 0){
	        while ($numero > 0 && $fila = mysqli_fetch_assoc($consulta)) {
	        	
	        	echo " <img id=\"libro\" src=\"imagenes","/",$fila['ruta_imagen'],"\">";
	        	echo $fila['titulo'], "</br>";
	            $numero--;
	        }
    	}
    	else{
    		echo "No hay ningún libro";
    	}


	}


	public function mostrarArray(){

		foreach ($this->arrayLibros as $clave => $valor) {
			echo $valor->valoracion," ", $valor->titulo, " </br>";
		}

	}
}



 ?>

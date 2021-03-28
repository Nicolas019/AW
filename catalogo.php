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

	public function ordenarPorVentas(){



	}

	public function buscaVentas($numero ){

		$sql = "SELECT titulo, L.ruta_imagen FROM libro L ORDER BY NumVentas DESC";
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

	public function buscaPaginas($numero ){

		$sql = "SELECT titulo, L.ruta_imagen FROM libro L ORDER BY numero_Paginas DESC";
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


	public function ordenarPorAutor(){

		$sql = "SELECT titulo, A.descripcionA FROM libro L JOIN autor A ON L.id_Autor = A.id_Autor ORDER BY L.id_Autor ASC";
        $consulta = $this->BaseDatos->query($sql);


        if($consulta->num_rows > 0){
	        while ($fila = mysqli_fetch_assoc($consulta)) {
	        	
	        	echo $fila['titulo'], " ", $fila['descripcionA'], "</br>";
	            
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


	public function ordenarPorValoracion($numero){
		$sql = "SELECT titulo, valoracion, ruta_imagen FROM libro L  ORDER BY L.valoracion DESC";
		        $consulta = $this->BaseDatos->query($sql);
	if($consulta->num_rows > 0){

	  while ($numero>0 && $fila = mysqli_fetch_assoc($consulta) ) {
	        	
	   	//echo $fila['titulo'], " ", $fila['valoracion'], "</br>";  
	  	$numero--;
	  	echo " <img id=\"libro\" src=\"imagenes","/",$fila['ruta_imagen'],"\">";
	       
	  }
    }
    else{
    		echo "No hay ningún libro";
    	}


	}

	public function ordenarPorGenero(){

		$sql = "SELECT titulo, G.descripcionG FROM libro L JOIN genero G ON L.id_Genero = G.id_Genero ORDER BY L.id_Genero ASC";
        $consulta = $this->BaseDatos->query($sql);


        if($consulta->num_rows > 0){
	        while ($fila = mysqli_fetch_assoc($consulta)) {
	        	
	        	echo $fila['titulo'], " ", $fila['descripcionG'], "</br>";
	            
	        }
    	}
    	else{
    		echo "No hay ningún libro";
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

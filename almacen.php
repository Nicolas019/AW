<?php 

class almacen{
	
	private $BaseDatos;
	private $libro;
	private $arrayStock;
	private $arrayEstado;
	private $arrayPrecios;

	public function __construct(){
		$db = BD::getInstance('localhost', 'athenea', 'athenea', 'libreria');
		$this->BaseDatos = $db->conectar();
		
		$this->arrayStock = array(4);
		$this->arrayEstado = array(4);
		$this->arrayPrecios = array(4);

		$n = 0;
		while($n < 4){
			$this->arrayEstado[$n] = null;
			$this->arrayStock[$n] = 0;
			$this->arrayPrecios[$n] = 0;
			$n++;
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

	public function hay_stock($id_libro){
		$i = 0;

		$sql = "SELECT L.titulo, L.precio, A.estado, A.stock FROM libro L JOIN almacen A ON A.id_libro=L.id_libro WHERE L.id_Libro=$id_libro";
		$consulta_stock = $this->BaseDatos->query($sql);
		if($consulta_stock->num_rows > 0){
	    	while($fila = mysqli_fetch_assoc($consulta_stock)){
	    		$this->libro = $fila['titulo'];

	    		if($fila['estado'] === "nuevo" && $fila['stock'] > 0){
	    			$this->arrayEstado[0] = $fila['estado'];
	    			$this->arrayStock[0] = $fila['stock'];
	    			$this->arrayPrecios[0] = $fila['precio'];
					$i++;
	    		}
	    		else if($fila['estado'] === "como nuevo" && $fila['stock'] > 0){
	    			$this->arrayEstado[1] = $fila['estado'];
	    			$this->arrayStock[1] = $fila['stock'];
	    			$this->arrayPrecios[1] = $fila['precio']*0.8;
	    			$i++;
	    		}
	    		else if($fila['estado'] === "buen estado" && $fila['stock'] > 0){
	    			$this->arrayEstado[2] = $fila['estado'];
	    			$this->arrayStock[2] = $fila['stock'];
	    			$this->arrayPrecios[2] = $fila['precio']*0.6;
	    			$i++;
	    		}
	    		else if($fila['estado'] === "aceptable" && $fila['stock'] > 0){
	    			$this->arrayEstado[3] = $fila['estado'];
	    			$this->arrayStock[3] = $fila['stock'];
	    			$this->arrayPrecios[3] = $fila['precio']*0.4;
	    			$i++;
	    		}

	    	}
    	}
    	else{
    		//no hay stock
    		return false;
    	}

    	if($i === 0){
    		//no hay stock
    		return false;
    	}
    	else{
    		//si hay stock
    		return true;
    	}
	}


	public function precio_nuevo(){
		return $this->arrayPrecios[0];
	}

	public function precio_como_nuevo(){
		return $this->arrayPrecios[1];
	}

	public function precio_buen_estado(){
		return $this->arrayPrecios[2];
	}

	public function precio_aceptable(){
		return $this->arrayPrecios[3];
	}

}

?>
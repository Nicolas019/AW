<?php 

class almacen{
	
	private $BaseDatos;
	private $conexion; // Necesario para después poder desconectar la BD
	
	private $id_libro;
	private $arrayStock;
	private $arrayEstado;
	private $arrayPrecios;
	private $num_estados_stock;
	private static final $NUM_ESTADOS = 4;

	public function __construct($id_libro, $precio){
		$db = BD::getInstance('localhost', 'athenea', 'athenea', 'libreria');
		$this->conexion = $db;
		$this->BaseDatos = $db->conectar();

		$this->id_libro = $id_libro;
		$this->vaciar_arrays();
		$this->llenar_arrays($precio);
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

	public function vaciar_arrays(){
		$this->arrayStock = array($NUM_ESTADOS);
		$this->arrayEstado = array($NUM_ESTADOS);
		$this->arrayPrecios = array($NUM_ESTADOS);

		$n = 0;
		while($n < $NUM_ESTADOS){
			$this->arrayEstado[$n] = null;
			$this->arrayStock[$n] = 0;
			$this->arrayPrecios[$n] = 0;
			$n++;
		}
	}

	public function llenar_arrays($precio){
		$sql_almacen = "SELECT A.estado, A.stock FROM almacen A WHERE A.id_libro=$this->id_libro";
		$cosulta_almacen = $this->BaseDatos->query($sql_almacen);

		$this->num_estados_stock = 0;
		if($cosulta_almacen->num_rows > 0){
	    	while($fila = mysqli_fetch_assoc($cosulta_almacen)){

	    		if($fila['estado'] === "nuevo" && $fila['stock'] > 0){
	    			$this->arrayEstado[0] = $fila['estado'];
	    			$this->arrayStock[0] = $fila['stock'];
	    			$this->arrayPrecios[0] = $precio;
					$this->num_estados_stock++;
	    		}
	    		else if($fila['estado'] === "como nuevo" && $fila['stock'] > 0){
	    			$this->arrayEstado[1] = $fila['estado'];
	    			$this->arrayStock[1] = $fila['stock'];
	    			$this->arrayPrecios[1] = $precio*0.8;
	    			$this->num_estados_stock++;
	    		}
	    		else if($fila['estado'] === "buen estado" && $fila['stock'] > 0){
	    			$this->arrayEstado[2] = $fila['estado'];
	    			$this->arrayStock[2] = $fila['stock'];
	    			$this->arrayPrecios[2] = $precio*0.6;
	    			$this->num_estados_stock++;
	    		}
	    		else if($fila['estado'] === "aceptable" && $fila['stock'] > 0){
	    			$this->arrayEstado[3] = $fila['estado'];
	    			$this->arrayStock[3] = $fila['stock'];
	    			$this->arrayPrecios[3] = $precio*0.4;
	    			$this->num_estados_stock++;
	    		}

	    	}
    	}
    	$cosulta_almacen->free();

	}

	public function hay_stock_libro(){
		return ($this->num_estados_stock != 0);
	}

	public function precio_libro($estado){

		if($estado === 'nuevo'){
			return $this->arrayPrecios[0];
		}
		else if($estado === 'como nuevo'){
			return $this->arrayPrecios[1];
		}
		else if($estado === 'buen estado'){
			return $this->arrayPrecios[2];			
		}
		else if($estado === 'aceptable'){
			return $this->arrayPrecios[3];
		}

	}

    public function restar_stock_libro($precio){
        $stock_libro = 0;
        $estado_libro;
        if($precio === $this->arrayPrecios[0]){
           $stock_libro = $this->arrayStock[0]--;
           $estado_libro = $this->arrayEstado[0];
        }
        else if($estado === $this->arrayPrecios[1]){
            $stock_libro = $this->arrayStock[1]--;
            $estado_libro = $this->arrayEstado[1];
        }
        else if($estado === $this->arrayPrecios[2]){
            $stock_libro = $this->$arrayStock[2]--;
            $estado_libro = $this->arrayEstado[2];
        }
        else if($estado === $this->arrayPrecios[3]){
            $stock_libro = $this->$arrayStock[3]--;
            $estado_libro = $this->arrayEstado[3];
        }

        $sql_almacen = "UPDATE almacen A SET A.stock=$stock_libro WHERE A.id_libro=$this->id_libro, A.estado=$estado_libro";
        $cosulta_almacen = $this->BaseDatos->query($sql_almacen);

        $cosulta_almacen->free();

    }

}

?>
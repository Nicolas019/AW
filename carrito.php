<?php
//muestra el carrito y nos lleva a compra.html

class carrito{

	private $id_usuario;
	private $id_libro;
	private $precio;
	private $BaseDatos;

	private function __construct($id_usuario, $id_libro, $precio){
		$BD = new BD('localhost', 'athenea', 'athenea', 'libreria');
		$this->BaseDatos = $BD->conectar();
		$this->id_usuario = $id_usuario;
		$this->id_libro = $id_libro;
		$this->precio = $precio;
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

	public function add_carrito($id_usuario, $id_libro, $precio){
		$sql = "INSERT INTO carrito VALUES ('$id_usuario', '$id_libro', '$precio')";
		$db->query($sql);
	}

}

?>
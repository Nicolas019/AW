<?php

require_once "../comun/libroEnVenta.php";

class carrito{

    private $BaseDatos;
	private $conexion; // Necesario para después poder desconectar la BD
    
	private $id_usuario;
	private $array_id_libro;
	private $array_precio;
    private $array_stock;
    private $num_libros;

	public function __construct($id_user){
		$this->conexion = BD::getInstance('localhost', 'athenea', 'athenea', 'libreria');
		$this->BaseDatos = $this->conexion->conectar();
        
		$this->id_usuario = $id_user;
        // consulta a la bbdd en la tabla carrito qué tiene (libros y precios) ese id_usuario y añadir a arrays y num_libros
        $sql = "SELECT * FROM carrito WHERE carrito.id_usuario=$id_user";

        $consulta = $this->BaseDatos->query($sql);
	   if($consulta->num_rows > 0){
           $i = 0;
            while($fila = mysqli_fetch_assoc($consulta)){
    
                $this->array_id_libro[$i] = $fila['id_libro'];
                $this->array_precio[$i] = $fila['precio'];
                $this->num_libros++;

                echo "<br />";
                $i++;  
            }
           
	   }
        $consulta->free();

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
    
    // Añadir algo al carrito
	public function add_carrito($id_libro, $precio){
		$sql = "INSERT INTO carrito VALUES ('$this->id_usuario', '$id_libro', '$precio')";
		$consulta = $this->BaseDatos->query($sql);
        $consulta->free();
        
	}
    
    // Comprobar stock de cada libro del carrito
    public function hay_Stock(){
        $i = 0;
        while ($i < $this->num_libros){
            $libro = new libroEnVenta($this->array_id_libro[$i]);
            $this->array_stock[$i] = $libro->hay_stock_libroEnVenta_Carrito($this->array_precio[$i]);
            $libro->desconectarBD();
            $i++;
        }
    }
    
    // Eliminar algo del carrito
    public function eliminar_de_Carrito($id_libro, $precio){
        
        // edito la bbdd
        $sql = "DELETE FROM carrito WHERE carrito.id_libro=$id_libro AND carrito.precio=$precio AND carrito.id_usuario=$this->id_usuario"; 
		$consulta = $this->BaseDatos->query($sql);
        //$consulta->free();
        
        //edito los arrays del objeto
        
        $sql2 = "SELECT * FROM carrito WHERE carrito.id_usuario=$this->id_usuario";

        $consulta2 = $this->BaseDatos->query($sql2);
	   if($consulta2->num_rows > 0){
           $i = 0;
            while($fila = mysqli_fetch_assoc($consulta2)){
    
                $this->array_id_libro[$i] = $fila['id_libro'];
                $this->array_precio[$i] = $fila['precio'];
                $this->num_libros++;

                echo "<br />";
                $i++;  
            }
           
	   }
        $consulta2->free();
        
        
    }
    

}

?>
<?php

require_once "../comun/libroEnVenta.php";
require_once "../comun/BD.php";

class carrito{

    private $BaseDatos;
	private $conexion; // Necesario para después poder desconectar la BD
    
	private $id_usuario;
	private $array_id_libro;
	private $array_estado;
    private $array_stock;
    private $array_cantidad;
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
                $this->array_estado[$i] = $fila['estado'];
                $this->array_cantidad[$i] = $fila['cantidad'];
                $this->num_libros++;
                
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
	static public function add_carrito($id_usuario, $id_libro, $estado, $cantidad){
		$conexion = BD::getInstance('localhost', 'athenea', 'athenea', 'libreria');
		$BaseDatos = $conexion->conectar();
        
        $sql = "SELECT * FROM carrito WHERE carrito.id_usuario=$id_usuario AND carrito.id_libro=$id_libro AND carrito.estado='$estado'";
        $consulta = $BaseDatos->query($sql);
        if($consulta->num_rows > 0){
            $cantidad_act = 0;
            while($fila = mysqli_fetch_assoc($consulta)){
                $cantidad_act = $fila['cantidad'];
            }
            $cantidad_act++;
            $sql3 = "UPDATE carrito SET carrito.cantidad=$cantidad_act WHERE carrito.id_usuario=$id_usuario AND carrito.id_libro=$id_libro AND carrito.estado='$estado'";
            $consulta3 = $BaseDatos->query($sql3);
       }
        
        else{
            $sql2 = "INSERT INTO carrito VALUES (null, '$id_usuario', '$id_libro', '$estado', '$cantidad')";
            $consulta2 = $BaseDatos->query($sql2);
       }
        $consulta->free();
        
    	$conexion->desconectar($BaseDatos);
        
	}
    
    // Comprobar stock de cada libro del carrito
    public function hay_Stock(){
        $i = 0;
        while ($i < $this->num_libros){
            $libro = new libroEnVenta($this->array_id_libro[$i]);
            $precio = $this->calcula_precio($this->array_id_libro[$i], $this->array_estado[$i]);
            $this->array_stock[$i] = $libro->hay_stock_libroEnVenta_Carrito($precio);
            $libro->desconectarBD();
            $i++;
        }
    }
    
    // Eliminar algo del carrito
    public function eliminar_de_Carrito($id_libro, $estado){
        
        // edito la bbdd
        $sql = "DELETE FROM carrito WHERE carrito.id_libro=$id_libro AND carrito.estado='$estado' AND carrito.id_usuario=$this->id_usuario"; 
		$consulta = $this->BaseDatos->query($sql);
        //$consulta->free();
        
        //edito los arrays del objeto
        
        $this->num_libros = 0;
        
        $sql2 = "SELECT * FROM carrito WHERE carrito.id_usuario=$this->id_usuario";

        $consulta2 = $this->BaseDatos->query($sql2);
	   if($consulta2->num_rows > 0){
           $i = 0;
            while($fila = mysqli_fetch_assoc($consulta2)){
    
                $this->array_id_libro[$i] = $fila['id_libro'];
                $this->array_estado[$i] = $fila['estado'];
                $this->array_cantidad[$i] = $fila['cantidad'];
                $this->num_libros++;

                $i++;  
            }
           
	   }
        $consulta2->free();
        
        
    }
    
    // Calcula precio
    
    public function calcula_precio($id_libro, $estado){
         
        $libro = new libroEnVenta($id_libro);
        $precio_nuevo = $libro->precio;
        $precio = $precio_nuevo;
        
        if ($estado === 'nuevo'){
           $precio = $precio_nuevo; 
        }
        else if($estado === 'como nuevo'){
            $precio = $precio_nuevo*0.8;
        }
        else if($estado === 'buen estado'){
            $precio = $precio_nuevo*0.6;
        }  
        else if($estado === 'aceptable'){
            $precio = $precio_nuevo*0.4;
        }
        
        return $precio;
    }
    
    // Calcular precio total
    
    
    public function calcula_precio_total(){
        
        $precio_total = 0;
        
        $i = 0;
        while ($i < $this->num_libros){
            
            $precio = $this->calcula_precio($this->array_id_libro[$i], $this->array_estado[$i])*$this->array_cantidad[$i];
            $precio_total = $precio_total + $precio;
                                                                  
            $i++;
        }
        
        
        return $precio_total;
    }
}

?>
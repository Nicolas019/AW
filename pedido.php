<?php

require_once "../comun/libroEnVenta.php";
require_once "../comun/BD.php";

class pedido{

    private $BaseDatos;
	private $conexion; // Necesario para después poder desconectar la BD

    private $id_pedido;
	private $id_usuario;
	private $nombre;
	private $apellidos;
	private $email;
    private $direccion;
    private $piso;
    private $letra;
    private $cp;
    private $ciudad;
    private $ca;
    private $precio_total;
    //private $array_id_libros;

	public function __construct($id_user){
		$this->conexion = BD::getInstance('localhost', 'athenea', 'athenea', 'libreria');
		$this->BaseDatos = $this->conexion->conectar();

		$this->id_usuario = $id_user;
        // consulta a la bbdd en la tabla carrito qué tiene (libros y precios) ese id_usuario y añadir a arrays y num_libros
        $sql = "SELECT * FROM pedido WHERE pedido.id_usuario=$id_user";

        $consulta = $this->BaseDatos->query($sql);
	   if($consulta->num_rows > 0){
           $i = 0;
            while($fila = mysqli_fetch_assoc($consulta)){
                $this->id_pedido = $fila['id_pedido'];
                $this->nombre = $fila['nombre'];
                $this->apellidos = $fila['apellidos'];
                $this->email = $fila['email'];
                $this->direccion = $fila['direccion'];
                $this->piso = $fila['piso'];
                $this->letra = $fila['letra'];
                $this->cp = $fila['cp'];
                $this->ciudad = $fila['ciudad'];
                $this->ca = $fila['ca'];
                //$this->precio_total = $fila['precio_total'];

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

    // Añadir a la tabla pedidos
	static public function add_pedido($id_usuario, $nombre, $apellidos, $email, $direccion, $piso, $letra, $cp, $ciudad,$ca ){
		$conexion = BD::getInstance('localhost', 'athenea', 'athenea', 'libreria');
		$BaseDatos = $conexion->conectar();

		$sql = "INSERT INTO carrito VALUES (null, '$id_usuario', '$nombre','$apellidos', '$email','$direccion','$piso','$letra','$cp','$ciudad','$ca')";
		$consulta = $BaseDatos->query($sql);

    	$conexion->desconectar($BaseDatos);

	}

    // Eliminar algo del carrito
    public function cancelar_pedido($id_libro, $precio){

        // edito la bbdd
        $sql = "DELETE FROM pedido WHERE pedido.id_pedido=$this->id_pedido";
        $consulta = $this->BaseDatos->query($sql);

        $sql2 = "SELECT * FROM pedido WHERE pedido.id_pedido=$this->id_pedido";

        $consulta2 = $this->BaseDatos->query($sql2);
       if($consulta2->num_rows > 0){
           $i = 0;
            while($fila = mysqli_fetch_assoc($consulta2)){

                $this->id_pedido = null ;
                $this->nombre = null;
                $this->apellidos = null;
                $this->email = null;
                $this->direccion = null;
                $this->piso = null;
                $this->letra = null;
                $this->cp = null;
                $this->ciudad = null;
                $this->ca = null;
                //$this->precio_total = null;
                echo "<br />";
                $i++;
            }

       }
        $consulta2->free();


    }
}

?>
<?php 

class comentarios{
	
	private $BaseDatos;
	private $conexion; // Necesario para después poder desconectar la BD

	private $id_libro;
	private $arrayComentarios;
	private $arrayUsuarios;
	private $num_comentarios;

	public function __construct($id_libro){
		$this->conexion = BD::getInstance('localhost', 'athenea', 'athenea', 'libreria');
		$this->BaseDatos = $this->conexion->conectar();
		
		$this->id_libro = $id_libro;
		$this->vaciar_arrays();
		$this->llenar_arrays();
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
		$this->arrayComentarios = array();
		$this->arrayUsuarios = array();
	}

	public function llenar_arrays(){
		$sql_comentarios = "SELECT C.descripcionC, C.id_usuario FROM comentario C WHERE C.id_Libro=$this->id_libro";
		$consulta_comentarios = $this->BaseDatos->query($sql_comentarios);
		
		$this->num_comentarios = 0;
		if($consulta_comentarios->num_rows > 0){
			while($fila = mysqli_fetch_assoc($consulta_comentarios)){
				$user = new usuario($fila['id_usuario']);

				$this->arrayUsuarios[$this->num_comentarios] = $user->__get($usuario);
				$this->arrayComentarios[$this->num_comentarios] = $fila['descripcionC'];			
				$this->num_comentarios++;

				$user->desconectarBD();
			}
		}
		$consulta_comentarios->free();

	}

	public function hay_comentarios(){
		return ($this->num_comentarios != 0);
	}

	public function add_comentario($id_usuario, $descripcion){
		$sql = "INSERT INTO comentario VALUES (NULL, '$this->id_Libro', '$id_usuario', '$descripcion')";
		$consulta = $this->BaseDatos->query($sql);
		$consulta->free();

		$user = new usuario($id_usuario);
		
		$this->arrayUsuarios[$this->num_comentarios] = $user->__get($usuario);
		$this->arrayComentarios[$this->num_comentarios] = $descripcion;			
		$this->num_comentarios++;

		$user->desconectarBD();
	}

	/*
	public function ver_comentarios(){
		$sql_comentario = "SELECT C.descripcionC, U.usuario, U.tipo_usuario FROM comentario C JOIN usuarios U ON C.id_usuario=U.id_usuario WHERE C.id_Libro=$this->id_libro";
	    $consulta_comentario = $this->BaseDatos->query($sql_comentario);
	    if($consulta_comentario->num_rows > 0){
	        echo "<br>Comentarios: </br>";
	        while($fila_comentario = mysqli_fetch_assoc($consulta_comentario)){
	        	if($fila_comentario['tipo_usuario'] != 'lector errante'){
	           	 	$this->print_comentario($fila_comentario['usuario'], $fila_comentario['tipo_usuario'], $fila_comentario['descripcionC']);       		
	        	}            
	        }  
	    }   
	    else{
	        echo "<br>Sin comentarios.</br>";
	    }  
		
	}

	public function print_comentario($usuario, $tipo, $comentario){
		echo "<br>@".$usuario." (".$tipo."): ";
		echo $comentario."</br>"; 
	}
	*/

}

?>
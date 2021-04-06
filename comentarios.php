<?php 

class comentarios{
	
	private $BaseDatos;
	

	public function __construct(){
		$db = BD::getInstance('localhost', 'athenea', 'athenea', 'libreria');
		$this->BaseDatos = $db->conectar();
		

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

	public function ver_comentarios($id){
		$sql_comentario = "SELECT C.descripcionC, U.usuario, U.tipo_usuario FROM comentario C JOIN usuarios U ON C.id_usuario=U.id_usuario WHERE C.id_Libro=$id";
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

	public function add_comentario($comentario, $id_libro, $id_usuario){
		$sql = "INSERT INTO comentario C VALUES (NULL, '$id_libro', '$id_usuario', '$comentario')";
		return $this->BaseDatos->query($sql);
	}

}

?>
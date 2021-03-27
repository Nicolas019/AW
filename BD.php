<?php 
/**
 * 
 */
class BD 
{	
	
	private $host;
	private $usuario;
	private $contrasenia;
	private $nombreBD;
	
	public function __construct($host, $usuario, $contrasenia, $nombreBD){
		$this->host =$host;
		$this->usuario =$usuario;
		$this->contrasenia =$contrasenia;
		$this->nombreBD =$nombreBD;

	}

	public function conectar () {
           $db = new mysqli( $this->host,$this->usuario, $this->contrasenia, $this->nombreBD) ;
            if (!$db->connect_error) {
                echo 'Conexion realizada correctamente.<br/>';
                echo 'Informacion sobre el servidor :' .    mysqli_get_host_info ( $db). '<br/>' ;
                echo 'Version del servidor' . mysqli_get_server_info ( $db) . '<br/>' ;
            } 
            else{
                printf (
                'Error %d : %s .<br /> ' ,
                mysqli_connect_errno( ) , mysqli_connect_error( ) ) ;
            }
            return  $db ;
        }
            // Cerrar BD
    public function desconectar( $conexion ) {
            if ($conexion) {
                $ok = mysqli_close($conexion) ;
                if ( $ok ) {
                    echo 'Desconexion realizada correctamente <br></br> ' ;
                } 
                else {
                    echo 'Fallo en la desconexion. <b r /> ' ;
                }
            } 
            else {
                echo 'Conexion no abierta .<b r /> ' ;
            }
    }

    public function __get($property){
    		if(property_exists($this, $property)) {
        	return $this->$property;
            }
    }


}
 ?>

<?php 
/**
 * 
 */
class BD 
{	
	private $db;
	private $host;
	private $usuario;
	private $contrasenia;
	private $nombreBD;
	
	public function __construct($host, $usuario, $contrasenia, $nombreBD){
		$this->host =$host;
		$this->usuario =$usuario;
		$this->contrasenia =$contrasenia;
		$this->nombreBD =$nombreBD;
		$this->db = null;

	}

	public function conectar ( ) {
           $this->db = mysqli_connect ( $host,$usuario, $contrasenia, $nombreBD) ;
            if (  $this->db ) {
                echo 'Conexion realizada correctamente.<br/>';
                echo 'Informacion sobre el servidor :' .    mysqli_get_host_info ( $this->db). '<br/>' ;
                echo 'Version del servidor' . mysqli_get_server_info ( $this->db) . '<br/>' ;
            } 
            else{
                printf (
                'Error %d : %s .<br /> ' ,
                mysqli_connect_errno( ) , mysqli_connect_error( ) ) ;
            }
            return  $this->db ;
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

 ?>
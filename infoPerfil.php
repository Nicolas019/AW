<?php 
	
	require_once '../comun/BD.php';
	require_once '../perfil/usuario.php';

	$init_sesion = (!isset($_SESSION["login"]) || $_SESSION["login"] === false) ? false : true;
	$nuevaPassword = isset($_POST["nuevaPassword"]) ? htmlspecialchars(trim(strip_tags($_POST["nuevaPassword"]))) : null;

	$id_user = isset($_SESSION['id_usuario']) ? $_SESSION["id_usuario"] : 0;
	$user = new usuario($id_user);

	if($nuevaPassword != null){
		$user->cambiaPassword($nuevaPassword);
	} 

	$nombre = $user->nombre;
	$foto = $user->foto_perfil;
	$user->desconectarBD();	

?>
<?php 
	
	require_once '../comun/BD.php';
	require_once '../perfil/usuario.php';

	$init_sesion = (!isset($_SESSION["login"]) || $_SESSION["login"] === false) ? false : true;
	$nuevaPassword = isset($_POST["nuevaPassword"]) ? htmlspecialchars(trim(strip_tags($_POST["nuevaPassword"]))) : null;

	$id_user = isset($_SESSION['id_usuario']) ? $_SESSION["id_usuario"] : 0;
	$user = new usuario($id_user);

	$print_nueva_password = "";
	if($nuevaPassword != null){
		$user->cambiaPassword($nuevaPassword);
		$print_nueva_password = "<p>Contraseña cambiada con éxito.</p>";
	} 

	$nombre = "<p>".$user->nombre."</p>";
	$foto = "<p><img id=\"libro\" src=\"../comun/imagenes/$user->foto_perfil\"></p>";
	$user->desconectarBD();	

?>
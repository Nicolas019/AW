<?php
	
	require_once '../comun/BD.php';
	require_once '../perfil/usuario.php';

	session_start();
	$username = isset($_POST["usuario"]) ? htmlspecialchars(trim(strip_tags($_POST["usuario"]))) : null;
	$password = isset($_POST["contrasenia"]) ? htmlspecialchars(trim(strip_tags($_POST["contrasenia"]))) : null;

	$usuario = new usuario(0);
	$existe_usuario = $usuario->login($username, $password);
	$usuario->desconectarBD();

	if($existe_usuario){
		header('Location: ../comun/index.php');
	}
	else{
		header('Location: ../perfil/login.php');
	}
    
?>
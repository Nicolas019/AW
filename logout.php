<?php
	require_once '../comun/BD.php';
	require_once '../perfil/usuario.php';
	
	session_start();
	
	$usuario = new usuario($_SESSION['id_usuario']);
	$usuario->logout();

	header('Location: ../comun/index.php');
?>
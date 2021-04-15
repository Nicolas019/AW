<?php 

	require_once '../comun/BD.php';
	require_once '../perfil/usuario.php';
	$echo ="";
	
	if(isset($_SESSION['login'])  && $_SESSION['login'] === true && isset($_SESSION['tipo_usuario']) &&  $_SESSION['tipo_usuario'] === "administrador"){
		require_once '../comun/formularioCrearLibro.php';
					
	}else{
			$echo.= "NECESITAS SER ADMINISTRADOR.";
		
		}
		
	


 ?>
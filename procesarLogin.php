<?php
	
	require 'BD.php';

	//Se hace siempre
	$BD = new BD('localhost', 'athenea', 'athenea', 'libreria');
	$db = $BD->conectar();

	$sql = "SELECT id_usuario, usuario, contrasenia, tipo_usuario FROM usuarios";
    $consulta = $db->query($sql);

	session_start();
	$username = $_POST["usuario"];
	$password = $_POST["contrasenia"];
	$_SESSION["login"] = false;

    if($consulta->num_rows > 0){
    	while($fila = mysqli_fetch_assoc($consulta)){
    		if($username === $fila["usuario"] && $password === $fila["contrasenia"]){	
				$_SESSION["login"] = true;

				$_SESSION["tipo_usuario"] = $fila["tipo_usuario"];
				$_SESSION["usuario"] = $fila["usuario"];
				$_SESSION["id_usuario"] = $fila["id_usuario"];

				header('Location: ./index.php');
			}
    	}
    	if($_SESSION["login"] === false){
    		header('Location: ./login.php');
    		//echo "No existe el usuario ".$username;
    	}
    }
	else{
		header('Location: ./login.php');
		//echo "No hay ningún usuario registrado.";
	}
    
?>
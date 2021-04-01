<?php
	
	require 'BD.php';

	//Se hace siempre
	$BD = new BD('localhost', 'athenea', 'athenea', 'libreria2');
	$db = $BD->conectar();

	$sql = "SELECT * FROM usuarios";
    $consulta = $db->query($sql);

    //formulario registrar
	$username = $_POST["usuario"];
	$password = $_POST["contrasenia"];
	$password2 = $_POST["contrasenia2"];
	$email = $_POST["email"];
	$name = $_POST["nombre"];
	$surname = $_POST["apellidos"];
	$tipo_usuario = "lector novato";

	// confirmar que no esté registrado
	$existe_user = false;
	if($consulta->num_rows > 0){
		// existe algún usuario
    	while($fila = mysqli_fetch_assoc($consulta)){
    		if($username === $fila["usuario"] || $email === $fila["email"]){	
				//usuario ya registrado
				$existe_user = true;
    			header('Location: /athenea/AW/registrar.php');
			}
    	}
    }
    
    if($existe_user === false){
		// contraseña coincide
		if($password2 !== $password){
		  	//la contraseña no es la misma
		   	header('Location: /athenea/AW/registrar.php');
		}
		else{
		    // registrar usuario
		    $sql2 = "INSERT INTO usuarios VALUES (NULL, '$username', '$email', '$password', '$name', '$surname', '$tipo_usuario')";
		    if($db->query($sql2) == true){
		    	//$nuevo_usuario = new usuario($username,$email,$password,$name,$surname,$tipo_usuario);
				header('Location: /athenea/AW/login.php');
		    }
			else{
			   	
			}
		}
	}
	

?>
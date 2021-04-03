<?php
	
	require 'BD.php';
	require 'listaUsuarios.php';
	require 'usuario.php';

	//Se hace siempre
	$BD = new BD('localhost', 'athenea', 'athenea', 'libreria');
	$db = $BD->conectar();

	$listaUsuarios = new listaUsuarios($db);

    //formulario registrar
	$username = $_POST["usuario"];
	$password = $_POST["contrasenia"];
	$password2 = $_POST["contrasenia2"];
	$email = $_POST["email"];
	$name = $_POST["nombre"];
	$surname = $_POST["apellidos"];
	$tipo_usuario = "lector novato";

	$sql = "SELECT * FROM usuarios";
    $consulta = $db->query($sql);

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
		    $listaUsuarios->add_usuario($username,$email,$password,$name,$surname,$tipo_usuario);
			header('Location: /athenea/AW/login.php');
		}
	}
	

?>
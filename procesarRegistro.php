<?php
	
	require '../comun/BD.php';
	require '../perfil/usuario.php';

	//Se hace siempre
	$BaseDatos = BD::getInstance('localhost', 'athenea', 'athenea', 'libreria');
	$db = $BaseDatos->conectar();

    //formulario registrar
	$username = isset($_POST["usuario"]) ? htmlspecialchars(trim(strip_tags($_POST["usuario"]))) : null;
    $password = isset($_POST["contrasenia"]) ? htmlspecialchars(trim(strip_tags($_POST["contrasenia"]))) : null;
    $password2 = isset($_POST["contrasenia2"]) ? htmlspecialchars(trim(strip_tags($_POST["contrasenia2"]))) : null;
    $email = isset($_POST["email"]) ? htmlspecialchars(trim(strip_tags($_POST["email"]))) : null;
    $name = isset($_POST["nombre"]) ? htmlspecialchars(trim(strip_tags($_POST["nombre"]))) : null;
    $surname = isset($_POST["apellidos"]) ? htmlspecialchars(trim(strip_tags($_POST["apellidos"]))) : null;
    $cumple = isset($_POST["bday"]) ? ($_POST["bday"]) : null;
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
    			header('Location: ../vista/registrar.php');
			}
    	}
    }
    
    if($existe_user === false){
		if($password2 !== $password){
		  	// la contraseña no es la misma
		   	header('Location: ../vista/registrar.php');
		}
		else{
			// contraseña coincide
		    // registrar usuario
		    $user = new usuario(0);
		    $user->registrar_usuario($username, $email, $password, $name, $surname, $tipo_usuario, $cumple);
		    $user->desconectarBD();
			header('Location: ../vista/login.php');
		}
	}
	

?>
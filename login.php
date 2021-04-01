<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="estilos.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Login</title>
</head>
<body>

<div id="contenedor">
<?php
		require 'menuGeneral.php';
?>
<main id="contenido">

		<article>
			
		<h2> Iniciar sesión </h2>
		
		<form method="POST" action="procesarLogin.php"> 
		
		<p> 
		Usuario:
		<input type="text" name="usuario" />
		</p>
		
		<p>
		Contraseña:
		<input type="password" name="contrasenia" />
		</p>
		
		<input type="submit" value="Enviar" />
		
		</form>

		<p>
			Si no estás registrado, puedes registrarte en el siguiente link: <a href="registrar.php">Registrarse</a>
		</p>
		
		
		
</article>

</main>

<?php 

require 'pie.php';

?>

</div> <!-- Fin del contenedor -->



</body>

</html>
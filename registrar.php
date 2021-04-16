<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../comun/estilos.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Login</title>
</head>
<body>

<div id="contenedor">
<?php
		require '../comun/menuPrincipal.php';
?>
<main id="contenido">

	<article>
			
		<h2> Registrar </h2>
		
		<form method="POST" action="../perfil/procesarRegistro.php"> 
		
			<p>	Nombre: <input type="text" name="nombre" required minlenght="2" required title="Introduzca un nombre válido"/></p>
            <p>	Apellidos: <input type="text" name="apellidos" pattern=".{2,20}" required title="Introduzca unos apellidos válidos"/></p>
            <p> Usuario:<input type="text" name="usuario" required title="Introduzca un usuario válido"/></p>
            <p>	Contraseña:	<input type="password" name="contrasenia" required title="Introduzca una contraseña"/> </p>
            <p>	Confirmar Contraseña: <input type="password" name="contrasenia2" required title="Introduzca la misma contraseña"/></p>
            <p>	Correo electrónico:	<input type="email" name="email" required /> </p>
            <p>	Fecha de nacimiento: <input type="date" name="bday" required /> </p>
		
		<input type="submit" value="Registrar" />
		
		</form>
		
		
	</article>

</main>

<?php 

require '../comun/pie.php';

?>

</div> <!-- Fin del contenedor -->



</body>

</html>
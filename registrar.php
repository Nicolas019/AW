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
		
		<p> 
		Nombre:
		<input type="text" name="nombre" />
		</p>

		<p> 
		Apellidos:
		<input type="text" name="apellidos" />
		</p>

		<p> 
		Usuario:
		<input type="text" name="usuario" />
		</p>
		
		<p>
		Contraseña:
		<input type="password" name="contrasenia" />
		</p>

		<p>
		Confirmar Contraseña:
		<input type="password" name="contrasenia2" />
		</p>

		<p> 
		Correo electrónico:
		<input type="text" name="email" />
		</p>

		<p> 
		Fecha de nacimiento:
		<input type="date" name="bday" />
		</p>
		
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
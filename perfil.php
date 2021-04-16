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
		require_once '../comun/menuPrincipal.php'; 
		require_once '../perfil/infoPerfil.php'; 
?>
<main id="contenido">

	<article>
			
		<h2> Ver perfil </h2>

		<p>
		<?php 

		echo $nombre;
		echo $foto;

		?>
		</p>

		<form method="POST" action="../vista/perfil.php"> 
		
		<p>
		Nueva contraseña:
		<input type="password" name="nuevaPassword" />
		<input type="submit" value="Enviar" />
		</p>
		
		<?php echo $print_nueva_password; ?>

		</form>

		<p>
		Cerrar sesión: <a href="../perfil/logout.php">Logout</a>
		</p>	
		
	</article>

</main>

<?php 

require '../comun/pie.php';

?>

</div> <!-- Fin del contenedor -->



</body>

</html>
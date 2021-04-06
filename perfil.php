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
		require '../comun/BD.php';
		require '../perfil/usuario.php';
?>
<main id="contenido">

		<article>
			
		<h2> Ver perfil </h2>
		
		<?php 

		$user = new usuario();
		$user->ver_usuario($_SESSION["id_usuario"]);

		?>

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
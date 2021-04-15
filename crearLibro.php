<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../comun/estilos.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Catálogo</title>
</head>

<body>

	<div id="contenedor">
		<?php 
		
		require_once '../comun/menuPrincipal.php';
		?>

		<main id="contenido">
			<?php 
				
				require_once'../comun/comprobarAdmin.php';
				echo $echo;
				
			?>
		</main>

		<?php require '../comun/pie.php'; ?>

	</div> <!-- Fin del contenedor -->

</body>
</html>

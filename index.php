<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="estilos.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Catálogo</title>
</head>


<body>

<div id="contenedor">
	<?php 
		require 'cabecera.php';
		require 'BD.php';
		require 'menu.php';
		require 'libro.php';
		require 'catalogo.php';

		$BD = new BD('localhost', 'athenea', 'athenea', 'libreria');
		$db = $BD->conectar();

		$catalogo = new catalogo($db);
		echo $catalogo->mostrarArray();
		$catalogo->ordenarPorAutor();
	 ?>
<main id="contenido">
	
	
</main>


<?php 

require 'pie.php';


?>

	

</div> <!-- Fin del contenedor -->

</body>
</html>

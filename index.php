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


	 ?>
<main id="contenido">
	
	<?php 

		$BD = new BD('localhost', 'athenea', 'athenea', 'libreria2');
		$db = $BD->conectar();

		$catalogo = new catalogo($db);
		$num=3;
		echo "<h3>  LIBROS MEJOR VALORADOS DEL MOMENTO</h3>";
		$catalogo->ordenarPorValoracion($num);


	?>
	
</main>


<?php 

require 'pie.php';


?>

	

</div> <!-- Fin del contenedor -->

</body>
</html>

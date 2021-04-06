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
		require '../comun/cabecera.php';
		require '../comun/BD.php';
		require '../comun/menu.php';
		require '../comun/libro.php';
		require '../catalogo/catalogo.php';
	 ?>

<main id="contenido">
	<?php 
		$catalogo = catalogo::getInstance();

		$num=3;
		echo "<h3>  LIBROS MEJOR VALORADOS DEL MOMENTO</h3>";
		$catalogo->ordenarPorValoracion(true);

		echo "<h3>  LIBROS MAS VENDIDOS</h3>";
		$catalogo->ordenarPorVentas(true);

		echo "<h3>  ULTIMAS NOVEDADES</h3>";
		$catalogo->mostrarNovedades($num);

		$catalogo->desconectarBD();
	?>
</main>

<?php 
require '../comun/pie.php';
?>

</div> <!-- Fin del contenedor -->

</body>
</html>

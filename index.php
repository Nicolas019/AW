<?php 
	require_once '../comun/BD.php';
	require_once '../comun/libro.php';
	$num=5;
	$echo="";

	$echo.= "<h3>  LIBROS MEJOR VALORADOS DEL MOMENTO</h3>";	
	$arrayLibros = libro::ordenarPor("valoracion",$num);
		foreach ($arrayLibros as $key => $value) {
			$echo.= "<a href=\"../compra/verLibro.php?id_Libro=$value->id_Libro\"> <img id=\"libro\" src=\"../comun/imagenes/$value->ruta_imagen\"> </a>";
		}

	$echo.= "<h3>  LIBROS MAS VENDIDOS</h3>";
	$arrayLibros = libro::ordenarPor("NumVentas",$num);
		foreach ($arrayLibros as $key => $value) {
			$echo.= "<a href=\"../compra/verLibro.php?id_Libro=$value->id_Libro\"> <img id=\"libro\" src=\"../comun/imagenes/$value->ruta_imagen\"> </a>";
		}
	
	$echo.=  "<h3>  ULTIMAS NOVEDADES</h3>";
	$arrayLibros = libro::ordenarPor("fecha_Lanzamiento",$num);
		foreach ($arrayLibros as $key => $value) {
			$echo.= "<a href=\"../compra/verLibro.php?id_Libro=$value->id_Libro\"> <img id=\"libro\" src=\"../comun/imagenes/$value->ruta_imagen\"> </a>";
		}
			
?>

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
		require_once '../comun/cabecera.php';
		require_once '../comun/menu.php';
		?>

		<main id="contenido">
			<?php 
				echo $echo;
			?>
		</main>

		<?php require '../comun/pie.php'; ?>

	</div> <!-- Fin del contenedor -->

</body>
</html>

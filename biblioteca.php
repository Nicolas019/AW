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
		require 'menuPrincipal.php';
		require 'BD.php';
		//require 'menuBiblioteca.php';
		require 'libro.php';
		require 'catalogo.php';

	  ?>
<main id="contenido">
	
	  <?php 
	//Se hace siempre
		$BD = new BD('localhost', 'athenea', 'athenea', 'libreria2');
		$db = $BD->conectar();

		$catalogo = new catalogo($db);

		//<form method= "get" action = ""
		
		$orden = isset($_GET["orden"]) ? $_GET["orden"] : null;
		$sentido = isset($_GET["sentido"]) ? $_GET["sentido"] : null;
		$sen=true;
		if ($sentido== "ASC") {
			$sen =false;
		}
		switch ($orden) {
			case 'Sin Ordenar':
				$num=3;
				echo "<h3>  LIBROS MEJOR VALORADOS DEL MOMENTO</h3>";
				$catalogo->ordenarPorValoracion(10,$sen);
				break;

			case 'Alfabetico':
				echo "<h3>GENERO CIENCIA FICCION</h3>";
				$catalogo->ordenarPorTitulo(10,$sen);
				break;

			case 'Fecha':
				echo "<h3>GENERO FANTASIA</h3>";
				$catalogo->ordenarPorFecha(10,$sen);
				break;
			case 'NumPaginas':
				echo "<h3>GENERO ROMANCE</h3>";
				$catalogo->ordenarPorPaginas(10,$sen);
				break;

			case 'Valoracion':
				echo "<h3>GENERO NOVELA POLICIACA</h3>";
				$catalogo->ordenarPorValoracion(10,$sen);
				break;
			
			case 'Ventas':
				echo "<h3>GENERO TERROR</h3>";
				$catalogo->ordenarPorVentas(10, $sen);
				break;			
			default:
				$num=3;
				echo "<h3>  LIBROS MEJOR VALORADOS DEL MOMENTO</h3>";
				$catalogo->ordenarPorValoracion(10,$sen);
				break;
		}



		require 'pasoPagina.php'
	 ?>
	
</main>

	

<?php 

require 'pie.php';


?>

</div> <!-- Fin del contenedor -->



</body>

</html>
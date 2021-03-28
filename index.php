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
		//Se hace siempre
		$BD = new BD('localhost', 'athenea', 'athenea', 'libreria');
		$db = $BD->conectar();

		$catalogo = new catalogo($db);


		
		$username = isset($_GET["opcion"]) ? $_GET["opcion"] : null;

		switch ($username) {
			case 'Sin Ordenar':
				$num=3;
				echo "<h3>  LIBROS MEJOR VALORADOS DEL MOMENTO</h3>";
				$catalogo->ordenarPorValoracion($num);
				break;

			case 'Ciencia Ficcion':
				echo "<h3>GENERO CIENCIA FICCION</h3>";
				$catalogo->buscarGenero(1);
				break;

			case 'Fantasia':
				echo "<h3>GENERO FANTASIA</h3>";
				$catalogo->buscarGenero(2);
				break;
			case 'Romance':
				echo "<h3>GENERO ROMANCE</h3>";
				$catalogo->buscarGenero(3);
				break;

			case 'Novela Policiaca':
				echo "<h3>GENERO NOVELA POLICIACA</h3>";
				$catalogo->buscarGenero(4);
				break;
			
			case 'Terror':
				echo "<h3>GENERO TERROR</h3>";
				$catalogo->buscarGenero(5);
				break;

			case 'Novela':
				echo "<h3>GENERO NOVELA</h3>";
				$catalogo->buscarGenero(6);
				break;

			case 'Novela Historica':
				echo "<h3>GENERO NOVELA HISTORICA</h3>";
				$catalogo->buscarGenero(7);
				break;
			
			default:
				$num=3;
				echo "<h3>  LIBROS MEJOR VALORADOS DEL MOMENTO</h3>";
				$catalogo->ordenarPorValoracion($num);
				break;
		}




	?>
	
</main>


<?php 

require 'pie.php';


?>

	

</div> <!-- Fin del contenedor -->

</body>
</html>

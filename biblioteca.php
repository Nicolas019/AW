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
		require 'libro.php';
		require 'catalogo.php';
		require 'navIzquierdo.php';
		

	  ?>
<main id="contenido">
	

	  <?php 	

		$catalogo = catalogo::getInstance();
		
		$pagina = isset($_GET["btnPag"]) ? $_GET["btnPag"] : null;
		$orden = isset($_GET["orden"]) ? $_GET["orden"] : null;
		$sentido = isset($_GET["sentido"]) ? $_GET["sentido"] : null;
		$sen=true;
		if ($sentido== "ASC") {
			$sen =false;
		}

		if($pagina != null){

			if($pagina == 'Siguiente'){
				$catalogo->paginaSiguiente();
			}
			else if($pagina == 'Anterior'){
				$catalogo->paginaAnterior();
			}

		}
		else{
			switch ($orden) {
				case 'Sin Ordenar':
					$num=3;
					echo "<h3>  LIBROS MEJOR VALORADOS DEL MOMENTO</h3>";
					$catalogo->ordenarPorValoracion(10,$sen);
					break;

				case 'Alfabetico':
					//echo "<h3>GENERO CIENCIA FICCION</h3>";
					$catalogo->ordenarPorTitulo($sen);
					break;

				case 'Fecha':
					//echo "<h3>GENERO FANTASIA</h3>";
					$catalogo->ordenarPorFecha(10,$sen);
					break;
				case 'NumPaginas':
					//echo "<h3>GENERO ROMANCE</h3>";
					$catalogo->ordenarPorPaginas(10,$sen);
					break;

				case 'Valoracion':
					//echo "<h3>GENERO NOVELA POLICIACA</h3>";
					$catalogo->ordenarPorValoracion(10,$sen);
					break;
				
				case 'Ventas':
					//echo "<h3>GENERO TERROR</h3>";
					$catalogo->ordenarPorVentas(10, $sen);
					break;			
				default:
					$num=3;
					//echo "<h3>  LIBROS MEJOR VALORADOS DEL MOMENTO</h3>";
					$catalogo->ordenarPorValoracion(10,$sen);
					break;
			}
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
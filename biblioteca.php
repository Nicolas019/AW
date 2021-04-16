<?php 
	require_once '../comun/BD.php';
	require_once '../comun/libro.php';
	require_once '../comun/autor.php';
	require_once '../comun/genero.php';
	require_once '../comun/editorial.php';
			
			
	$pagina = isset($_GET["pasarPagina"]) ? htmlspecialchars(trim(strip_tags($_GET["pasarPagina"]))) : null;
	$orden = isset($_GET["orden"]) ? htmlspecialchars(trim(strip_tags($_GET["orden"]))) : "titulo";
	$sentido = isset($_GET["sentido"]) ? htmlspecialchars(trim(strip_tags($_GET["sentido"]))) : null;

	//GET BUSQUEDA
	$buscar = isset($_GET["buscar"]) ? htmlspecialchars(trim(strip_tags($_GET["buscar"]))) : null;

	//GET GENEROS
	$Ciencia_Ficcion = isset($_GET["Ciencia_Ficcion"]) ? htmlspecialchars(trim(strip_tags($_GET["Ciencia_Ficcion"]))) : 0;
	$Fantasia = isset($_GET["Fantasia"]) ? htmlspecialchars(trim(strip_tags($_GET["Fantasia"]))) : 0;
	$Novela = isset($_GET["Novela"]) ? htmlspecialchars(trim(strip_tags($_GET["Novela"]))) : 0;	
	$Novela_Historica = isset($_GET["Novela_Historica"]) ? htmlspecialchars(trim(strip_tags($_GET["Novela_Historica"]))) : 0;	
	$Novela_Policiaca = isset($_GET["Novela_Policiaca"]) ? htmlspecialchars(trim(strip_tags($_GET["Novela_Policiaca"]))) : 0;	
	$Romance = isset($_GET["Romance"]) ? htmlspecialchars(trim(strip_tags($_GET["Romance"]))) : 0;	
	$Terror = isset($_GET["Terror"]) ? htmlspecialchars(trim(strip_tags($_GET["Terror"]))) : 0;	

	$arrayGeneros = array();

	$arrayGeneros[0]= $Ciencia_Ficcion;
	$arrayGeneros[1]= $Fantasia;
	$arrayGeneros[2]= $Novela;
	$arrayGeneros[3]= $Novela_Historica;
	$arrayGeneros[4]= $Novela_Policiaca;
	$arrayGeneros[5]= $Romance;
	$arrayGeneros[6]= $Terror;	      

	//GET PRECIOS
	$precioMin = isset($_GET["precioMin"]) ? htmlspecialchars(trim(strip_tags($_GET["precioMin"]))) : 0;
	$precioMax = isset($_GET["precioMax"]) ? htmlspecialchars(trim(strip_tags($_GET["precioMax"]))) : 1000;

	$echo="";
	$sen=true;
	if ($sentido== "ASC") {
		$sen =false;
	}

	if($pagina != null){

		if($pagina == 'Siguiente'){

		}
		else if($pagina == 'Anterior'){

		}

	}
	else if(isset($_GET["buscar"])){
		$arrayLibros = libro::buscar($buscar,5);
		
		foreach ($arrayLibros as $key => $value) {
			$echo .= "<a href=\"../vista/verLibro.php?id_Libro=$value->id_Libro\"> <img id=\"libro\" src=\"../comun/imagenes/$value->ruta_imagen\"> </a>";
		}
		if(empty($arrayLibros)){
			$echo.= "<h3> Ningun libro cumple con los requisitos seleccionados :(</h3>";
			$echo.= "<img id=\"nofiltro\" src=\"../comun/imagenes\busqueda_fallida.png\">";
		}

	}
	else if(!isset($_GET["orden"])){

		$arrayLibros = libro::ordenarPor("NumVentas",5);
		foreach ($arrayLibros as $key => $value) {
			$echo.= "<a href=\"../vista/verLibro.php?id_Libro=$value->id_Libro\"> <img id=\"libro\" src=\"../comun/imagenes/$value->ruta_imagen\"> </a>";
		}


	}
	else{

		$arrayLibros = libro::filtros($arrayGeneros,$sen,$orden,$precioMin,$precioMax, 5);
		foreach ($arrayLibros as $key => $value) {
			$echo.= "<a href=\"../vista/verLibro.php?id_Libro=$value->id_Libro\"> <img id=\"libro\" src=\"../comun/imagenes/$value->ruta_imagen\"> </a>";
		}
		if(empty($arrayLibros)){
			$echo.= "<h3> Ningun libro cumple con los requisitos seleccionados :(</h3>";
			$echo.= "<img id=\"nofiltro\" src=\"../comun/imagenes\busqueda_fallida.png\">";
		}

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

<?php require_once '../comun/menuPrincipal.php'; ?>

<div id="displayFlex">

    <?php  require '../catalogo/navIzquierdo.php';  ?>

	<main id="contenido">
		
		<h3> Resultados de busqueda: </h3>
		 <?php 

		 echo $echo;

		  ?>
		
	</main>

</div>

<?php 

require '../comun/pie.php';


?>

</div> <!-- Fin del contenedor -->



</body>

</html>
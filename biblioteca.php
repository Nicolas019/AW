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
			

	  ?>
<div id="displayFlex">

    <?php

        require 'navIzquierdo.php';
    ?>
	<main id="contenido">
		
			<h3> Resultados de busqueda: </h3>
		  <?php 	

			$catalogo = catalogo::getInstance();
			
			$pagina = isset($_GET["btnPag"]) ? $_GET["btnPag"] : null;
			$orden = isset($_GET["orden"]) ? $_GET["orden"] : "titulo";
			$sentido = isset($_GET["sentido"]) ? $_GET["sentido"] : null;

			//GET BUSQUEDA
			$buscar = isset($_GET["buscar"]) ? $_GET["buscar"] : null;

			//GET GENEROS
			$Ciencia_Ficcion = isset($_GET["Ciencia_Ficcion"]) ? $_GET["Ciencia_Ficcion"] : 0;
			$Fantasia = isset($_GET["Fantasia"]) ? $_GET["Fantasia"] : 0;
			$Novela = isset($_GET["Novela"]) ? $_GET["Novela"] : 0;	
			$Novela_Historica = isset($_GET["Novela_Historica"]) ? $_GET["Novela_Historica"] : 0;	
			$Novela_Policiaca = isset($_GET["Novela_Policiaca"]) ? $_GET["Novela_Policiaca"] : 0;	
			$Romance = isset($_GET["Romance"]) ? $_GET["Romance"] : 0;	
			$Terror = isset($_GET["Terror"]) ? $_GET["Terror"] : 0;	
			
			$arrayGeneros = array();
		
	 				$arrayGeneros[0]= $Ciencia_Ficcion;
	 				$arrayGeneros[1]= $Fantasia;
	 				$arrayGeneros[2]= $Novela;
	 				$arrayGeneros[3]= $Novela_Historica;
	 				$arrayGeneros[4]= $Novela_Policiaca;
	 				$arrayGeneros[5]= $Romance;
	 				$arrayGeneros[6]= $Terror;	      




			//GET PRECIOS
			$precioMin = isset($_GET["precioMin"]) ? $_GET["precioMin"] : 0;
			$precioMax = isset($_GET["precioMax"]) ? $_GET["precioMax"] : 1000;


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
			else if(isset($_GET["buscar"])){
				$catalogo->buscar($buscar);
			}
			else if(!isset($_GET["orden"])){
					$catalogo->ordenarPorVentas(true);
			}
			else{

				
				$catalogo->filtros($arrayGeneros,$sen,$orden,$precioMin,$precioMax);
			}


			//require 'pasoPagina.php'
		 ?>
		
	</main>

</div>

<?php 

require 'pie.php';


?>

</div> <!-- Fin del contenedor -->



</body>

</html>
<?php 


//comprobar si es admin
//mostrar formulario

	require_once '../comun/BD.php';
	require_once '../perfil/usuario.php';
	//$echo ="";
	/*if(isset($_SESSION['login'])  && $_SESSION['login'] == true && isset($_SESSION['tipo_usuario']) &&  $_SESSION['tipo_usuario'] = "administrador"){

					
		}else{
			$echo.= "NECESITAS SER ADMINISTRADOR.";
		}*/
		//require_once '../comun/formularioCrearLibro.php';
	


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
		
		require_once '../comun/menuPrincipal.php';
		?>

		<main id="contenido">
			<?php 
				require_once '../comun/formularioCrearLibro.php';
			?>
		</main>

		<?php require '../comun/pie.php'; ?>

	</div> <!-- Fin del contenedor -->

</body>
</html>

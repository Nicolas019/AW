<?php 

require_once '../comun/BD.php';
require_once '../comun/libro.php';



	if(isset ($_POST["titulo"]) && isset ($_POST["precio"]) && isset ($_POST["fecha_Lanzamiento"]) && isset ($_POST["numero_Paginas"]) &&  isset ($_POST["sinopsis"])){

		$titulo =  htmlspecialchars(trim(strip_tags($_POST["titulo"])));
		$autor =  htmlspecialchars(trim(strip_tags($_POST["autor"])));
		$genero =  htmlspecialchars(trim(strip_tags($_POST["genero"])));
		$editorial =  htmlspecialchars(trim(strip_tags($_POST["editorial"])));
		$precio =  htmlspecialchars(trim(strip_tags($_POST["precio"])));
		$numero_Paginas =  htmlspecialchars(trim(strip_tags($_POST["numero_Paginas"])));
		$fecha_Lanzamiento =  htmlspecialchars(trim(strip_tags($_POST["fecha_Lanzamiento"])));
		$sinopsis =  htmlspecialchars(trim(strip_tags($_POST["sinopsis"])));

		$intPrecio=filter_var($precio,FILTER_SANITIZE_NUMBER_INT);
		$intPaginas =  filter_var($numero_Paginas,FILTER_SANITIZE_NUMBER_INT);

		$nombre_imagen = $_FILES['imagen']['name'];
		$tipo_imagen = $_FILES['imagen']['type'];
		$tamaño_imagen = $_FILES['imagen']['size'];
		echo $tipo_imagen;
		/*if(!((strpos($tipo_imagen,"image/jpg"))) || !((strpos($tipo_imagen,"image/jpeg"))) ){
			echo "El fichero seleccionado tiene que ser de tipo jpg.";
		}else */
		$echo ="";
		if($intPrecio <0 || $intPaginas<0){//>0 comprobación parametros
			
			//$echo .="Algun parametro del formulario no es valido";
			header('Location: ../comun/crearLibro.php');
		}else{
			$name = basename($_FILES['imagen']['name']);
			if (move_uploaded_file($_FILES['imagen']['tmp_name'], "../comun/imagenes/$name")){
				echo "Imagen guardada";
			}else{
				echo "NO se pudo guardar";
			}
			
			echo libro::crearLibro($titulo,$autor,$genero,$editorial,$intPrecio,$intPaginas,$fecha_Lanzamiento,$sinopsis,$nombre_imagen);
		}


	}else{
		
		//$echo .="Faltan campos por rellenar en el formulario";
		header('Location: ../comun/crearLibro.php');
	}

	



 ?>
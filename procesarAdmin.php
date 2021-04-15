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
		echo $nombre_imagen;
		echo $tipo_imagen;
		echo $tamaño_imagen;
		if($tamaño_imagen > 8388608){//8388608 = 8GB
			header('Location: ../comun/panelAdmin.php');
		} 
		if(strpos($tipo_imagen,'jpg') === false && strpos($tipo_imagen,'jpeg') === false ){
			//"El fichero seleccionado tiene que ser de tipo jpg.";
			header('Location: ../comun/panelAdmin.php');
		}
		$echo ="";
		if($intPrecio <=0 || $intPaginas<=0){//>0 comprobación parametros
			
			//"Algun parametro del formulario no es valido";
			header('Location: ../comun/panelAdmin.php');
		}else{
			$name = basename($_FILES['imagen']['name']);
			if (move_uploaded_file($_FILES['imagen']['tmp_name'], "../comun/imagenes/$name")){
				//"Imagen guardada";

			}else{
				header('Location: ../comun/panelAdmin.php');
				//"NO se pudo guardar";
			}
			
			echo libro::crearLibro($titulo,$autor,$genero,$editorial,$intPrecio,$fecha_Lanzamiento,$intPaginas,$sinopsis,$nombre_imagen);
			header('Location: ../comun/index.php');
		}


	}else if(isset ($_GET["nombreAutor"])){

		$nombreAutor =  htmlspecialchars(trim(strip_tags($_GET["nombreAutor"])));
		
		if(filter_var($nombreAutor,FILTER_SANITIZE_NUMBER_INT)!= NULL){
			header('Location: ../comun/panelAdmin.php');
		}else{
			autor::crearAutor($nombreAutor);
			header('Location: ../comun/index.php');
		}
		

	}
	else{
		
		//"Faltan campos por rellenar en el formulario";
		header('Location: ../comun/panelAdmin.php');
	}

	



 ?>
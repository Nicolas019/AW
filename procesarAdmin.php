<?php 

require_once '../comun/BD.php';
require_once '../comun/libro.php';


	if(isset($_GET["eliminarSubmit"])){ //OPCION PARA ELMINAR EL LIBRO SELECCIONADO

		$eliminarLibro =  htmlspecialchars(trim(strip_tags($_GET["eliminarLibro"])));
		
		if (libro::eliminarLibro($eliminarLibro)==true){//LIBRO ELIMINADO CORRECTAMENTE
			
			header('Location: ../vista/index.php');

		}else{//NO SE PUDO ELIMINAR EL LIBRO

			header('Location: ../vista/panelAdmin.php');
		}

		
	}//OPCION AÑADIR NUEVO LIBRO
	else if(isset ($_POST["titulo"]) && isset ($_POST["precio"]) && isset ($_POST["fecha_Lanzamiento"]) && isset ($_POST["numero_Paginas"]) &&  isset ($_POST["sinopsis"])){

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
			header('Location: ../vista/panelAdmin.php');
		} 
		if(strpos($tipo_imagen,'jpg') === false && strpos($tipo_imagen,'jpeg') === false ){
			//"El fichero seleccionado tiene que ser de tipo jpg.";
			header('Location: ../vista/panelAdmin.php');
		}
		$echo ="";
		if($intPrecio <=0 || $intPaginas<=0){//>0 comprobación parametros
			
			//"Algun parametro del formulario no es valido";
			header('Location: ../vista/panelAdmin.php');
		}else{
			$name = basename($_FILES['imagen']['name']);
			if (move_uploaded_file($_FILES['imagen']['tmp_name'], "../comun/imagenes/$name")){
				//"Imagen guardada";

			}else{
				header('Location: ../vista/panelAdmin.php');
				//"NO se pudo guardar";
			}
			
			echo libro::crearLibro($titulo,$autor,$genero,$editorial,$intPrecio,$fecha_Lanzamiento,$intPaginas,$sinopsis,$nombre_imagen);
			header('Location: ../vista/index.php');
		}


	}else if(isset ($_GET["nombreAutor"])){//OPCION AÑADIR AUTOR

		$nombreAutor =  htmlspecialchars(trim(strip_tags($_GET["nombreAutor"])));
		
		if(filter_var($nombreAutor,FILTER_SANITIZE_NUMBER_INT)!= NULL){
			header('Location: ../vista/panelAdmin.php');
		}else{
			if (autor::crearAutor($nombreAutor)==true){
				header('Location: ../vista/index.php');
			}else{
				header('Location: ../vista/panelAdmin.php');
			}
		}
		
	}
	else{
		
		//"Faltan campos por rellenar en el formulario";
		header('Location: ../vista/panelAdmin.php');
	}

	



 ?>
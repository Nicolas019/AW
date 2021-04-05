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
		require '../comun/menuPrincipal.php';
		require '../comun/BD.php';
        require '../comun/libro.php'
?>
<main id="contenido">

<?php
	
	$id = $_GET["id_Libro"];

	//Se hace siempre
	$BD = new BD('localhost', 'athenea', 'athenea', 'libreria');
	$db = $BD->conectar();

    //Mostrar información del libro
    $sql = "SELECT L.*, A.descripcionA, G.descripcionG, E.descripcionE FROM libro L JOIN autor A ON L.id_Autor=A.id_Autor JOIN genero G ON G.id_Genero=L.id_Genero JOIN editorial E ON L.id_Editorial=E.id_Editorial WHERE L.id_Libro=$id";
    $consulta = $db->query($sql);
    if($consulta->num_rows > 0){
        while($fila = mysqli_fetch_assoc($consulta)){

            $libro = new libro($fila['titulo'], $fila['descripcionA'], $fila['descripcionG'], $fila['descripcionE'], $fila['precio'], $fila['numero_Paginas'], $fila['sinopsis'], $fila['valoracion'], $fila['ruta_imagen'], $fila['NumVentas'], $fila['fecha_Lanzamiento']);
            $libro->ver_libro();

        }   
    }  
    
    //Comprobar si hay stock y mostrar los diferentes estados
    $estado_nuevo = false;
    $estado_comonuevo = false;
    $estado_buenestado = false;
    $estado_aceptable = false;

    $sql2 = "SELECT estado,stock FROM almacen WHERE id_libro=$id";
    $consulta2 = $db->query($sql2);
    if($consulta2->num_rows > 0){
    	while($fila2 = mysqli_fetch_assoc($consulta2)){
    		if($fila2['estado'] === "nuevo" && $fila2['stock'] > 0){
    			$estado_nuevo = true;
    		}
    		else if($fila2['estado'] === "como nuevo" && $fila2['stock'] > 0){
    			$estado_comonuevo = true;
    		}
    		else if($fila2['estado'] === "buen estado" && $fila2['stock'] > 0){
    			$estado_buenestado = true;
    		}
    		else if($fila2['estado'] === "aceptable" && $fila2['stock'] > 0){
    			$estado_aceptable = true;
    		}
    	}
    }

    //Boton de comprar según cada estado y precio
    if($estado_nuevo===false && $estado_comonuevo===false && $estado_buenestado===false &&  $estado_aceptable===false){
    	echo "<br>No hay stock disponible.</br>";
    }
    if(!isset($_SESSION["login"])){
    	echo "<br>Hay que iniciar sesión para comprar.</br>";
    }
    else{
		$precio_nuevo = 0;

    	$sql3 = "SELECT precio FROM libro WHERE id_Libro=$id";
    	$consulta3 = $db->query($sql3);
    	
    	if($consulta3->num_rows > 0){
    		while($fila3 = mysqli_fetch_assoc($consulta3)){
    			$precio_nuevo = $fila3['precio'];
    		}
    	}

    	$precio_comonuevo = $precio_nuevo*0.8;
    	$precio_buenestado = $precio_nuevo*0.6;
    	$precio_aceptable = $precio_nuevo*0.4;

    	?>
        <br>Precios:</br>
    	<form action ="../compra/procesarLibro.php" method="POST">
					
			<select name="precio_libro"> 
			<?php
				if($estado_nuevo === true){
					echo "<option value=$precio_nuevo> Nuevo ($precio_nuevo) </option>";				
				}
						
				if($estado_comonuevo === true){
					echo "<option value=$precio_comonuevo> Como nuevo ($precio_comonuevo) </option>";
				}
			
				if($estado_buenestado === true){
					echo "<option value=$precio_buenestado> Buen estado ($precio_buenestado) </option>";
				}
		
				if($estado_aceptable === true){
					echo "<option value=$precio_aceptable> Aceptable ($precio_aceptable) </option>";
				}
			?>
			</select>			

			<input type="hidden" name="id_libro" value=<?php echo "$id"; ?> >
			<input type="hidden" name="id_usuario" value=<?php echo $_SESSION['id_usuario']; ?> >

			<button type="submit" name ="submit" value ="add_carrito">Añadir al carrito</button>
            
		</form>


    <?php
    }

    $sql_comentario = "SELECT C.descripcionC, U.usuario, U.tipo_usuario FROM comentario C JOIN usuarios U ON C.id_usuario=U.id_usuario WHERE C.id_Libro=$id";
    $consulta_comentario = $db->query($sql_comentario);
    if($consulta_comentario->num_rows > 0){
        echo "<br>Comentarios: </br>";
        while($fila_comentario = mysqli_fetch_assoc($consulta_comentario)){

            $libro->ver_comentario($fila_comentario['usuario'], $fila_comentario['tipo_usuario'], $fila_comentario['descripcionC']);                                      

        }  
    }   
    else{
        echo "<br>Sin comentarios.</br>";
    }  

    ?>

</main>
	
<?php 
require '../comun/pie.php';
?>

</div> <!-- Fin del contenedor -->

</body>

</html>

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
?>
<main id="contenido">

<?php
	
	$id = $_GET["id_Libro"];

	//Se hace siempre
	$BD = new BD('localhost', 'athenea', 'athenea', 'libreria');
	$db = $BD->conectar();

	$sql = "SELECT * FROM libro L WHERE L.id_Libro=$id";
    $consulta = $db->query($sql);

    //Mostrar información del libro
    if($consulta->num_rows > 0){
    	while($fila = mysqli_fetch_assoc($consulta)){
    		echo "<br>". $fila['titulo'] ."</br>";
    		echo "<br><img id=\"libro\" src=\"imagenes","/",$fila['ruta_imagen'],"\"></br>";
   		}
    }
    
    //Comprobar si hay stock y mostrar los diferentes estados
    $sql2 = "SELECT estado,stock FROM almacen WHERE id_libro=$id";
    $consulta2 = $db->query($sql2);

    $estado_nuevo = false;
    $estado_comonuevo = false;
    $estado_buenestado = false;
    $estado_aceptable = false;

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
    else{

    }


    //Boton de comprar según cada estado y precio
    if($estado_nuevo===false && $estado_comonuevo===false && $estado_buenestado===false &&  $estado_aceptable===false){
    	echo "No hay stock disponible.";
    }
    if(!isset($_SESSION["login"])){
    	echo "Hay que iniciar sesión para comprar.";
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
    	<form action ="procesarLibro.php" method="POST">
					
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
    ?>

    
	

</main>
	
<?php 
require 'pie.php';
?>

</div> <!-- Fin del contenedor -->

</body>

</html>

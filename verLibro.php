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
        require '../comun/libro.php';
        require '../comun/almacen.php';
        require '../comun/comentarios.php';
?>
<main id="contenido">

    <?php

    //Mostrar información del libro
    $id = $_GET["id_Libro"];
    $libro = new libro($id);
    $libro->ver_libro();

    //Comprobar si hay stock y mostrar los diferentes estados
    $almacen_libros = new almacen();
    if(!$almacen_libros->hay_stock($id)){
        //no hay stock
        echo "<br>No hay stock disponible.</br>";
    }
    else{
        //si hay stock
        if(!isset($_SESSION["login"])){
            echo "<br>Hay que iniciar sesión para comprar.</br>";
        }
        else{
            $estado_nuevo = ($almacen_libros->precio_nuevo() != 0);  
            $estado_comonuevo = ($almacen_libros->precio_como_nuevo() != 0);  
            $estado_buenestado = ($almacen_libros->precio_buen_estado() != 0); 
            $estado_aceptable = ($almacen_libros->precio_aceptable() != 0); 

    ?>

    <br>Precios:</br>
    <form action ="../compra/verCarrito.php" method="POST">
					
		<select name="precio_libro"> 
		<?php
			if($estado_nuevo === true){
                $precio_nuevo = $almacen_libros->precio_nuevo();
				echo "<option value=$almacen_libros->precio_nuevo()> Nuevo ($precio_nuevo) </option>";				
			}
						
			if($estado_comonuevo === true){
                $precio_como_nuevo = $almacen_libros->precio_como_nuevo();
				echo "<option value=$almacen_libros->precio_como_nuevo()> Como nuevo ($precio_como_nuevo </option>";
			}
			
			if($estado_buenestado === true){
                $precio_buen_estado = $almacen_libros->precio_buen_estado();
				echo "<option value=$almacen_libros->precio_buen_estado()> Buen estado ($precio_buen_estado </option>";
			}
		
			if($estado_aceptable === true){
                $precio_aceptable = $almacen_libros->precio_aceptable();
				echo "<option value=$almacen_libros->precio_aceptable()> Aceptable ($precio_aceptable </option>";
			}
		?>
		</select>			

		<input type="hidden" name="id_libro" value=<?php echo "$id"; ?> >
		<input type="hidden" name="id_usuario" value=<?php echo $_SESSION['id_usuario']; ?> >

		<button type="submit" name ="submit" value ="add_carrito">Añadir al carrito</button>
            
	</form>


    <?php
        }
    }
    $comentario = new comentarios();

    $nuevo_comentario = isset($_POST["comentario_nuevo"]) ? $_POST["comentario_nuevo"] : null;
    if($nuevo_comentario!=null){
        if(!$comentario->add_comentario($nuevo_comentario, $id, $_SESSION['id_usuario'])){
            echo "Error al añadir el comentario.";
        }
    }
    
    $comentario->ver_comentarios($id);   

    if(isset($_SESSION["login"])){
        //puede comentar y valorar si no es lector errante
        if($_SESSION["tipo_usuario"] != 'lector errante'){
            require '../compra/formularioComentario.html';
        }
    }            

    ?>

</main>
	
<?php 
require '../comun/pie.php';
?>

</div> <!-- Fin del contenedor -->

</body>

</html>

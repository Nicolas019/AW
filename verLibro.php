<?php
    require_once '../comun/BD.php';
    require_once '../comun/libroEnVenta.php';
    
    $init_sesion = (!isset($_SESSION["login"]) || $_SESSION["login"] === false) ? false : true;
    
    //Libro en venta
    $id_Libro = isset($_GET["id_Libro"]) ? htmlspecialchars(trim(strip_tags($_GET["id_Libro"]))) : 0;
    $book = new libroEnVenta($id_Libro);
    $titulo = $book->$titulo;
    $autor = $book->$autor;
    $genero = $book->$genero;
    $editorial = $book->$editorial;
    $ruta_imagen = $book->$ruta_imagen;
    $valoracion = $book->$valoracion;
    $num_stars = $book->$numStars;
    $num_pags = $book->$numPag;
    $sinopsis = $book->$sinopsis;
    $fecha_lanzamiento = $book->$fecha;

    //Almacen
    $hay_stock = $book->hay_stock_libroEnVenta();
    $precio_nuevo = ($book->precio_libroEnVenta('nuevo') != 0) ? $book->precio_libroEnVenta('nuevo') : 0;
    $precio_como_nuevo = ($book->precio_libroEnVenta('como nuevo') != 0) ? $book->precio_libroEnVenta('como nuevo') : 0;
    $precio_buen_estado = ($book->precio_libroEnVenta('buen estado') != 0) ? $book->precio_libroEnVenta('buen estado') : 0;
    $precio_aceptable = ($book->precio_libroEnVenta('aceptable') != 0) ? $book->precio_libroEnVenta('aceptable') : 0;

    //Desconectar base de datos
    $book->desconectarBD();

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
        echo "<h2>".$titulo."</h2>";
        echo "<h3>".$autor."</h3>";
        echo "<br>Valoración: ".$valoracion."</br>";
        $i = 0;
        while($numStars > $i){
            echo "<img id=\"valor\" src=\"../comun/imagenes","/","star.png","\">";
            $i = $i + 1;
        }

        echo "<br>Género: ".$genero."</br>";
        echo "<br>Editorial: ".$editorial."</br>";

        if($num_pags != NULL){
            
        }
        echo "<br>Número de páginas: ".$num_pags."</br>";

        if($fecha_lanzamiento != NULL){
            echo "<br>Fecha de lanzamiento: ".$fecha_lanzamiento."</br>";
        }
        echo "<br><img id=\"ver_libro\" src=\"../comun/imagenes","/",$ruta_img,"\"></br>";
        echo "<br>Sinopsis: ".$sinopsis."</br>";
    ?>

    <br>Precios:</br>
    <form action ="../compra/verCarrito.php" method="POST">
					
		<select name="precio_libro"> 
		<?php
			if($precio_nuevo != 0){
				echo "<option value=$precio_nuevo> Nuevo ($precio_nuevo) </option>";
			}
						
			if($precio_como_nuevo != 0){
				echo "<option value=$precio_como_nuevo Como nuevo ($precio_como_nuevo) </option>";
			}
			
			if($precio_buen_estado != 0){
				echo "<option value=$precio_buen_estado> Buen estado ($precio_buen_estado) </option>";
			}
		
			if($precio_aceptable != 0){
				echo "<option value=$precio_aceptable> Aceptable ($precio_aceptable) </option>";
			}
		?>
		</select>			

		<input type="hidden" name="id_libro" value=<?php echo "$id_Libro"; ?> >
		<input type="hidden" name="id_usuario" value=<?php echo $_SESSION['id_usuario']; ?> >

		<button type="submit" name ="submit" value ="add_carrito">Añadir al carrito</button>
            
	</form>


    <?php

    $comentario = new comentarios();

    $nuevo_comentario = isset($_GET["comentario_nuevo"]) ? $_GET["comentario_nuevo"] : null;
    if($nuevo_comentario!=null){
        if($comentario->add_comentario($nuevo_comentario, $id_Libro, $_SESSION['id_usuario']) === false){
            echo "<br>Error al añadir el comentario.</br>";
        }
    }
    
    $comentario->ver_comentarios($id_Libro);   

    if(isset($_SESSION["login"]) && $_SESSION["login"] === true){
        //puede comentar y valorar si no es lector errante
        if($_SESSION["tipo_usuario"] != 'lector errante'){
            
            ?>
            <br>Añadir un comentario:</br>
            <form action ="../compra/verLibro.php" method="GET">
                <p> Comentario: 
                    <input type="text" name="comentario_nuevo" />
                </p>
                <input type="hidden" name="id_Libro" value=<?php echo "$id_Libro"; ?> >
                <input type="submit" name ="submit" value="Añadir"></button>
            </form>
            <?php

        }
    }            

    ?>

</main>
	
<?php 
require_once '../comun/pie.php';
?>

</div> <!-- Fin del contenedor -->

</body>

</html>

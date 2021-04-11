<?php

    require_once '../comun/BD.php';
    require_once '../comun/libroEnVenta.php';
    
    $init_sesion = (!isset($_SESSION["login"]) || $_SESSION["login"] === false) ? false : true;
    
    //Libro en venta
    $id_Libro = isset($_GET["id_Libro"]) ? htmlspecialchars(trim(strip_tags($_GET["id_Libro"]))) : 0;
    $book = new libroEnVenta($id_Libro);
    $titulo = ($book->titulo != null) ? $book->titulo : "";
    $autor = ($book->autor != null) ? $book->autor : ""; 
    $genero = ($book->genero != null) ? $book->genero : "";
    $editorial = ($book->editorial != null) ? $book->editorial : "";
    $ruta_imagen = ($book->ruta_imagen != null) ? $book->ruta_imagen : "";
    $valoracion = ($book->valoracion != null) ? $book->valoracion : "";
    $numStars = ($book->numStars != null) ? $book->numStars : "";
    $num_pags = ($book->numPag != null) ? $book->numPag : "";
    $sinopsis = ($book->sinopsis != null) ? $book->sinopsis : "";
    $fecha_lanzamiento = ($book->fecha != null) ? $book->fecha : "";

    //Almacen
    $hay_stock = $book->hay_stock_libroEnVenta();
    $precio_nuevo = ($book->precio_libroEnVenta('nuevo') != 0) ? $book->precio_libroEnVenta('nuevo') : 0;
    $precio_como_nuevo = ($book->precio_libroEnVenta('como nuevo') != 0) ? $book->precio_libroEnVenta('como nuevo') : 0;
    $precio_buen_estado = ($book->precio_libroEnVenta('buen estado') != 0) ? $book->precio_libroEnVenta('buen estado') : 0;
    $precio_aceptable = ($book->precio_libroEnVenta('aceptable') != 0) ? $book->precio_libroEnVenta('aceptable') : 0;

    //Desconectar base de datos
    $book->desconectarBD();

    //Imprime la información del libro
    $stars = "";
    $i = 0;
    while($numStars > $i){
        $stars .= "<img id=\"valor\" src=\"../comun/imagenes\star.png\">";
        $i = $i + 1;
    }

    $print_info_libro = "<h2>".$titulo."</h2>"."<h3>".$autor."</h3>"."<p>Valoración: ".$valoracion."</p>".$stars."<p>Género: ".$genero."</p>"."<p>Editorial: ".$editorial."</p>"."<p>Número de páginas: ".$num_pags."</p>"."<p>Fecha de lanzamiento: ".$fecha_lanzamiento."</p>"."<p><img id=\"ver_libro\" src=\"../comun/imagenes/$ruta_imagen\"></p>"."<p>Sinopsis: ".$sinopsis."</p>";

    //Imprime los precios del libro según el stock
    $print_precios = "";
    if($precio_nuevo != 0){
        $print_precios .= "<option value=$precio_nuevo> Nuevo ($precio_nuevo) </option>";
    }                
    if($precio_como_nuevo != 0){
        $print_precios .= "<option value=$precio_como_nuevo Como nuevo ($precio_como_nuevo) </option>";
    }    
    if($precio_buen_estado != 0){
        $print_precios .= "<option value=$precio_buen_estado> Buen estado ($precio_buen_estado) </option>";
    }
    if($precio_aceptable != 0){
        $print_precios .= "<option value=$precio_aceptable> Aceptable ($precio_aceptable) </option>";
    }    

    //Imprime el botón de "Añadir al carrito" si ha iniciado sesión
    $print_input_and_submit = "";
    if($init_sesion){
        $id_user = $_SESSION['id_usuario'];
        $print_input_and_submit .= "<input type=\"hidden\" name=\"id_usuario\" value=\"$id_user\";>"."<input type=\"hidden\" name=\"id_libro\" value=\"$id_Libro\";>"."<button type=\"submit\" name=\"submit\" value =\"add_carrito\">Añadir al carrito</button>";
    }
    else{
        $print_input_and_submit .= "<p>Hay que iniciar sesión para comprar.</p>";
    }

    //Añade del nuevo comentario
    /*
    $nuevo_comentario = isset($_GET["comentario_nuevo"]) ? htmlspecialchars(trim(strip_tags($_GET["comentario_nuevo"]))) : null;
    if($nuevo_comentario!=null){
    	$book->add_comentario_libroEnVenta($_SESSION['id_usuario'], $nuevo_comentario);
    }

    
    //Imprime los comentarios
    $arrayComentarios = $book->descripcion_comentarios_libroEnVenta(); 
    $arrayUsuarios = $book->usuarios_comentarios_libroEnVenta();
    $numComentarios = $book->num_comentarios_libroEnVenta();

    $print_comentarios = "<p>Comentarios: </p>";
    $j=0;
    while($j < $numComentarios){
    	$print_comentarios .= "<p>@".$arrayUsuarios[$j].": ".$arrayComentarios[$j]."</p>";
    }

    //Escribe el nuevo comentario si hay sesión iniciada
    $print_hidden_idLibro = "";
    if($init_sesion){
        //puede comentar y valorar si no es lector errante
        if($_SESSION["tipo_usuario"] != 'lector errante'){
			$print_hidden_idLibro = "<input type=\"hidden\" name=\"id_libro\" value=\"$id_Libro\";>";
        }
    }            
    */

?>


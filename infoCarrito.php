<?php

	require_once '../comun/BD.php';
    require_once '../compra/carrito.php';

    $debe_registrar=""; // Para mostrar mensaje de es necesario registrarse, en su caso
    $mostrar_carrito =""; // Para mostrar el carrito
    $stock ="No hay stock de los libros: "; // Para mostrar mensaje de que no hay stock de algun libro, en su caso

    if(isset($_GET['id_usuario']) && isset($_GET['id_libro']) && isset($_GET['precio_libro'])){

      carrito::add_carrito($_GET['id_usuario'], $_GET['id_libro'], $_GET['precio_libro']);
        
    }

    if(!isset($_SESSION['login']) || $_SESSION['login'] === false){
        $debe_registrar = "Debe registrarse para ver el carrito";
    }

    else{ // Si hay un usuario con sesión inciada
        
        $id_usuario = $_SESSION['id_usuario'];

        $carro = new carrito($id_usuario);
        
        if (isset($_GET['id_oculto']) && isset($_GET['precio_oculto'])){ // Si se ha dado a un botón de eliminar
              
          //echo $_GET['id_oculto'];
          //echo $_GET['precio_oculto'];
            
            $carro->eliminar_de_Carrito($_GET['id_oculto'], $_GET['precio_oculto']);
        }
        
        // Mostrar carrito del usuario

        $i = 0;
        while ($i < $carro->num_libros){
            $libro = new libroEnVenta($carro->array_id_libro[$i]);
            $precio_libro = $carro->array_precio[$i];
            
            $mostrar_carrito = $mostrar_carrito.
                "<p><img id=\"libro\" src=\"../comun/imagenes/$libro->ruta_imagen\">".
                $libro->titulo." - ".$carro->array_precio[$i]." ".
                "<form action=\"verCarrito.php\" method=\"get\">".
                "<input type=\"hidden\" name=\"id_oculto\" value=\"$libro->id_Libro\";>".
                "<input type=\"hidden\" name=\"precio_oculto\" value=\"$precio_libro\";>".
                "<input type=\"submit\" value=\"Eliminar del carrito\"></p>".
                "</form>";
            
            $libro->desconectarBD();
            $libro = null;
            $i++;
        }

        // Comprobar que hay stock suficiente del carrito

        $carro->hay_Stock();

        $i = 0;
        while ($i < $carro->num_libros){
            $libro = new libroEnVenta($carro->array_id_libro[$i]);
            if(!$carro->array_stock[$i]){
                $stock = $stock."<p>".$libro->titulo." - ".$carro->array_precio[$i]."</p>";
            }
            $libro->desconectarBD();
            $libro = null;
            $i++;
        }
        

        $carro->desconectarBD();
        $carro = null;
    }

?>
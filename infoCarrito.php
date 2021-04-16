<?php

	require_once '../comun/BD.php';
    require_once '../compra/carrito.php';

    $carrito_vacio=true;
    $hay_stock=true;

    $debe_registrar=""; // Para mostrar mensaje de es necesario registrarse, en su caso
    $mostrar_carrito =""; // Para mostrar el carrito
    $stock ="No hay stock de los libros: "; // Para mostrar mensaje de que no hay stock de algun libro, en su caso

    if(isset($_GET['id_usuario']) && isset($_GET['id_libro']) && isset($_GET['estado_libro'])){

      carrito::add_carrito($_GET['id_usuario'], $_GET['id_libro'], $_GET['estado_libro'], 1);
        
    }

    if(!isset($_SESSION['login']) || $_SESSION['login'] === false){
        $debe_registrar = "Debe registrarse para ver el carrito";
        $precio_carrito = "0";
    }

    else{ // Si hay un usuario con sesión inciada
        
        $id_usuario = $_SESSION['id_usuario'];

        $carro = new carrito($id_usuario);
        
        if (isset($_GET['id_oculto']) && isset($_GET['estado_oculto'])){ // Si se ha dado a un botón de eliminar
              
          //echo $_GET['id_oculto'];
          //echo $_GET['precio_oculto'];
            
            $carro->eliminar_de_Carrito($_GET['id_oculto'], $_GET['estado_oculto']);
        }
        
        // Mostrar carrito del usuario

        $i = 0;
        while ($i < $carro->num_libros){
            $carrito_vacio = false;
            $libro = new libroEnVenta($carro->array_id_libro[$i]);
            $estado_libro = $carro->array_estado[$i];
            $precio_libro = $carro->calcula_precio($carro->array_id_libro[$i], $estado_libro);
            
            $mostrar_carrito = $mostrar_carrito.
                "<p><img id=\"libro\" src=\"../comun/imagenes/$libro->ruta_imagen\">".
                $libro->titulo." - Estado: ".$carro->array_estado[$i]." - Precio: ".$precio_libro." euros - ".$carro->array_cantidad[$i]." unidades ".
                "<form action=\"verCarrito.php\" method=\"get\">".
                "<input type=\"hidden\" name=\"id_oculto\" value=\"$libro->id_Libro\";>".
                "<input type=\"hidden\" name=\"estado_oculto\" value=\"$estado_libro\";>".
                "<input type=\"submit\" value=\"Eliminar del carrito\"></p>".
                "</form>";
            
            $libro->desconectarBD();
            $libro = null;
            $i++;
        }
        
        // Calcular precio total carrito

        $precio_carrito = $carro->calcula_precio_total();
    

        // Comprobar que hay stock suficiente del carrito

        $carro->hay_Stock();

        $i = 0;
        while ($i < $carro->num_libros){
            $libro = new libroEnVenta($carro->array_id_libro[$i]);
            if($carro->array_cantidad[$i] > $carro->array_stock[$i]){
                $hay_stock = false;
                $stock = $stock."<p>".$libro->titulo." - Estado: ".$carro->array_estado[$i]." - Hay ".$carro->array_stock[$i]." unidades en stock"."</p>";
            }
            $libro->desconectarBD();
            $libro = null;
            $i++;
        }
        

        $carro->desconectarBD();
        $carro = null;
    }

?>
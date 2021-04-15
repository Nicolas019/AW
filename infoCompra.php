<?php
    require_once '../compra/carrito.php';
    require_once '../comun/libroEnVenta.php';

    //POST FORMULARIO
    $nombre = isset($_POST["nombre"]) ? htmlspecialchars(trim(strip_tags($_POST["nombre"]))) : null;
    $apellidos = isset($_POST["apellidos"]) ? htmlspecialchars(trim(strip_tags($_POST["apellidos"]))) : null;
    $email = isset($_POST["email"]) ? htmlspecialchars(trim(strip_tags($_POST["email"]))) : null;
    $direccion = isset($_POST["direccion"]) ? htmlspecialchars(trim(strip_tags($_POST["direccion"]))) : null;
    $piso = isset($_POST["piso"]) ? htmlspecialchars(trim(strip_tags($_POST["piso"]))) : null;
    $letra = isset($_POST["letra"]) ? htmlspecialchars(trim(strip_tags($_POST["nombre"]))) : null;
    $cp = isset($_POST["cp"]) ? htmlspecialchars(trim(strip_tags($_POST["cp"]))) : null;
    $ciudad = isset($_POST["ciudad"]) ? htmlspecialchars(trim(strip_tags($_POST["ciudad"]))) : null;
    $ca = isset($_POST["ca"]) ? htmlspecialchars(trim(strip_tags($_POST["ca"]))) : null;
    $numero_tarjeta = isset($_POST["numero_tarjeta"]) ? htmlspecialchars(trim(strip_tags($_POST["numero_tarjeta"]))) : null;
    $caducidad = isset($_POST["nombre"]) ? htmlspecialchars(trim(strip_tags($_POST["caducidad"]))) : null;
    $cvv = isset($_POST["cvv"]) ? htmlspecialchars(trim(strip_tags($_POST["cvv"]))) : null;

    //variable id_usuario
    $id_usuario = isset($_SESSION["id_usuario"]) ? $_SESSION["id_usuario"] : null;

    //crear carrito
    $carrito = new carrito($id_usuario);
    $array_id = $carrito->array_id_libro;
    $array_estado = $carrito->array_estado;
    $array_cantidad = $carrito->array_cantidad;
    $numElems = $carrito->num_libros;

    //crear pedido
    //$pedido = new pedido($id_usuario);
    //$pedido->add_pedido($id_usuario, $nombre, $apellidos, $email, $direccion, $piso, $letra, $cp, $ciudad,$ca );

    //actualizar ventas, restar Stock y eliminar libros del carrito
    for($i=0;$i < $numElems;$i++){
        $libroEnVenta = new libroEnVenta($array_id[$i]);

        $libroEnVenta->suma_ventas($array_cantidad[$i]);
        $precioL = $carrito->calcula_precio($array_id[$i], $array_estado[$i]);
        $libroEnVenta->restar_stock_libroEnVenta($precioL, $array_cantidad[$i]);
        $carrito->eliminar_de_Carrito($array_id[$i], $array_estado[$i]);

        $libroEnVenta->desconectarBD();
    }

    $carrito->desconectarBD();

?>
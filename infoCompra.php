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

    // 1. new carrito(idUsuario)
    // 2. llamar a la funcion de carrito que devuelva un array de libros y de precios precios (numElems o devolver o .size())
    // 3. bucle por numElems para llamar a cada libro hacer un new de libroEnVenta con el id (que me da Sergio en el array)
    // en ese bucle llamo a restar_stock_libroEnVenta y sumaVentas
    // 4. llamar a funcion Sergio vaciarCarrito

    
    $id_usuario = isset($_SESSION["id_usuario"]) ? $_SESSION["id_usuario"] : null;

    $carrito = new carrito($id_usuario);
    $array_id = $carrito->array_id_libro;
    $array_precios = $carrito->array_precio;
    $numElems = $carrito->num_libros;

    for($i=0;$i < $numElems;$i++){
        $libroEnVenta = new libroEnVenta($array_id[$i]);

        $libroEnVenta->suma_ventas(1);
        $libroEnVenta->restar_stock_libroEnVenta($array_precios[$i]);
        $carrito->eliminar_de_Carrito($array_id[$i],$array_precios[$i]);

        $libroEnVenta->desconectarBD();
    }

    $carrito->desconectarBD();

?>
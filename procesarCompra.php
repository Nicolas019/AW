<?php
    require_once '../comun/libroEnVenta.php';
    // 1. new carrito(idUsuario)
    // 2. llamar a la funcion de carrito que devuelva un array de libros y de precios precios (numElems o devolver o .size())
    // 3. bucle por numElems para llamar a cada libro hacer un new de libroEnVenta con el id (que me da Sergio en el array)
    // en ese bucle llamo a restar_stock_libroEnVenta y sumaVentas
    // 4. llamar a funcion Sergio vaciarCarrito

    sumaVentas(1);
    restar_stock_libroEnVenta($precio);
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

Compra realizada con éxito. Pronto recibirá su pedido en su domicilio.

</main>

<?php
    require_once '../comun/pie.php';
?>

</div> <!-- Fin del contenedor -->

</body>
</html>



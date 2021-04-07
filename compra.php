<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../comun/estilos.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Login</title>
</head>
<body>

<div id="contenedor">
<?php
	require '../comun/menuPrincipal.php';
?>
<main id="contenido">

		<article>

		<h2> Datos de compra </h2>

		<form method="POST" action="procesarCompra.php">

        <h4> Información general </h4>
            <p>	Nombre: <input type="text" name="nombre" /></p>
            <p>	Apellidos: <input type="text" name="apellidos" /></p>
        <h4> Información de envío general </h4>
            <p>	Dirección: <input type="text" name="direccion" /></p>
            <p>	Piso: <input type="text" name="piso" /></p>
            <p>	Letra: <input type="text" name="letra" /></p>
            <p>	Código Postal: <input type="text" name="cp" /></p>
            <p>	Ciudad: <input type="text" name="ciudad" /></p>
            <p>	Comunidad Autónoma: <input type="text" name="ca" /></p>
        <h4> Método de pago </h4>
            <p>	Número de tarjeta: <input type="text" name="numero_tarjeta" /></p>
            <p>	Fecha de caducidad: <input type="text" name="caducidad" /></p>
            <p>	CVV: <input type="text" name="cvv" /></p>
		<input type="submit" value="Enviar" />

		</form>


</article>

</main>

<?php

require '../comun/pie.php';

?>

</div> <!-- Fin del contenedor -->



</body>

</html>
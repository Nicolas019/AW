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
	require_once '../comun/menuPrincipal.php';
?>
<main id="contenido">

		<article>

		<h2> Datos de compra </h2>

		<form method="POST" action="../compra/procesarCompra.php">

        <h4> Información general </h4>
            <p>	Nombre: <input type="text" name="nombre" required minlenght="2" required title="Introduzca un nombre válido"/></p>
            <p>	Apellidos: <input type="text" name="apellidos" pattern=".{2,20}" required title="Introduzca unos apellidos válidos"/></p>
            <p> Email: <input type="email" name="email" required/> </p>
        <h4> Información de envío </h4>
            <p>	Dirección: <input type="text" name="direccion" pattern=".{2,20}" required title="Introduzca una dirección válida"/></p>
            <p>	Piso: <input type="text" name="piso" /></p>
            <p>	Letra: <input type="text" name="letra" /></p>
            <p>	Código Postal: <input type="text" name="cp" pattern=".{5}" required title="El código postal es obligatorio"/></p>
            <p>	Ciudad: <input type="text" name="ciudad" required lenght="5" pattern=".{2,20}" required title="Introduzca una ciudad válido"/></p>
            <p>	Comunidad Autónoma: <input type="text" name="ca" pattern=".{2,30}" required title="Introduzca unos apellidos válido" /></p>
        <h4> Método de pago </h4>
            <p>	Número de tarjeta: <input type="text" name="numero_tarjeta" pattern=".{16}" required title="La longitud de la tarjeta de crédito es inválida, introduzca 16 caracteres"/></p>
            <p>	Fecha de caducidad: <input type="month" name="caducidad" required min="2021-04"/></p>
            <p>	CVV: <input type="text" name="cvv" pattern=".{3}" required title="La longitud es inválida, por favor introduzca 3 caracteres"/></p>
		<input type="submit" value="Enviar" />

		</form>


</article>

</main>

<?php

require_once '../comun/pie.php';

?>

</div> <!-- Fin del contenedor -->



</body>

</html>
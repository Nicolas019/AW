<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../comun/estilos.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Carrito</title>
</head>
<body>

<div id="contenedor">
<?php
	require_once '../comun/menuPrincipal.php';
    require_once '../compra/infoCarrito.php';
?>
<main id="contenido">

		<article>

            <h2> Carrito </h2>
            
            <p> <?php echo $debe_registrar; ?> </p>
            
            <p> <?php echo $mostrar_carrito; ?> </p>
            
          
            <h3> No hay stock de los libros: </h3>
            
            <p> <?php if ($stock !== "") echo $stock; ?> </p>
           
         <!--   Eliminar del carrito:
            <form action="pagina.php" method="post"> 

                <select name="eliminar"> 
                    <option value="1">1</option> 
                    <option value="2">2</option> 
                </select> 
                <input type="submit" name="eliminar">
                
            </form> 
          -->
            
            <a href='../compra/compra.php'>Comprar</a>
            <a href='../catalogo/biblioteca.php'>Seguir mirando</a>


        </article>

</main>

<?php
    require_once '../comun/pie.php';
?>

</div> <!-- Fin del contenedor -->



</body>

</html>



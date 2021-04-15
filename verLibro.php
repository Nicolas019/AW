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
    require_once '../compra/infoLibro.php';
?>
<main id="contenido">

    <?php
        echo $print_info_libro;
    ?>

    <br>Precios:</br>
    <form action ="../compra/verCarrito.php" method="GET">
					
		<select name="estado_libro"> 
		<?php
			echo $print_precios;
		?>
		</select>
        <?php
            echo $print_input_and_submit;
        ?>			
            
	</form>
    
    <!--
    <p>Añadir un comentario:</p>
    <form action ="../compra/verLibro.php" method="GET">
        <p> Comentario: 
            <input type="text" name="comentario_nuevo" />
        </p>
            <?php
                //echo $print_hidden_idLibro;
            ?>
            <input type="submit" name ="submit" value="Añadir"></button>
    </form>
    -->

</main>
	
<?php 
require_once '../comun/pie.php';
?>

</div> <!-- Fin del contenedor -->

</body>

</html>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="estilos.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Catálogo</title>
</head>
<body>

<div id="contenedor">
<?php
		require 'menuPrincipal.php';
		require 'BD.php';
        require 'libro.php'
?>
<main id="contenido">

<?php
	
	$id = $_GET["id_Libro"];

	//Se hace siempre
	$BD = new BD('localhost', 'athenea', 'athenea', 'libreria');
	$db = $BD->conectar();

    //Mostrar información del libro
    $sql = "SELECT * FROM libro L WHERE L.id_Libro=$id";
    $consulta = $db->query($sql);
    if($consulta->num_rows > 0){
        while($fila = mysqli_fetch_assoc($consulta)){

            $idA = $fila['id_Autor'];
            $sql_autor = "SELECT descripcionA FROM autor A WHERE A.id_Autor=$idA";
            $consulta_autor = $db->query($sql_autor);
            if($consulta_autor->num_rows > 0){
                while($fila_autor = mysqli_fetch_assoc($consulta_autor)){

                    $idG = $fila['id_Genero'];
                    $sql_genero = "SELECT descripcionG FROM genero G WHERE G.id_Genero=$idG";
                    $consulta_genero = $db->query($sql_genero);
                    if($consulta_genero->num_rows > 0){
                        while($fila_genero = mysqli_fetch_assoc($consulta_genero)){

                            $idE = $fila['id_Editorial'];
                            $sql_editorial = "SELECT descripcionE FROM editorial E WHERE E.id_Editorial=$idE";
                            $consulta_editorial = $db->query($sql_editorial);
                            if($consulta_editorial->num_rows > 0){
                                while($fila_editorial = mysqli_fetch_assoc($consulta_editorial)){

                                    $libro = new libro($fila['titulo'], $fila_autor['descripcionA'], $fila_genero['descripcionG'], $fila_editorial['descripcionE'], $fila['precio'], $fila['numero_Paginas'], $fila['sinopsis'], $fila['valoracion'], $fila['ruta_imagen'], $fila['NumVentas'], $fila['fecha_Lanzamiento']);
                                    $libro->ver_libro();

                                }   //cierra fila_editorial
                            }   //cierra consulta_editorial

                        }   //cierra fila_genero
                    }   //cierra consulta_genero

                }   //cierra fila_autor
            }   //cierra consulta_autor

        }   //cierra fila   
    }   //cierra consulta
    
    //Comprobar si hay stock y mostrar los diferentes estados
    $sql2 = "SELECT estado,stock FROM almacen WHERE id_libro=$id";
    $consulta2 = $db->query($sql2);

    $estado_nuevo = false;
    $estado_comonuevo = false;
    $estado_buenestado = false;
    $estado_aceptable = false;

    if($consulta2->num_rows > 0){
    	while($fila2 = mysqli_fetch_assoc($consulta2)){
    		if($fila2['estado'] === "nuevo" && $fila2['stock'] > 0){
    			$estado_nuevo = true;
    		}
    		else if($fila2['estado'] === "como nuevo" && $fila2['stock'] > 0){
    			$estado_comonuevo = true;
    		}
    		else if($fila2['estado'] === "buen estado" && $fila2['stock'] > 0){
    			$estado_buenestado = true;
    		}
    		else if($fila2['estado'] === "aceptable" && $fila2['stock'] > 0){
    			$estado_aceptable = true;
    		}
    	}
    }

    //Boton de comprar según cada estado y precio
    if($estado_nuevo===false && $estado_comonuevo===false && $estado_buenestado===false &&  $estado_aceptable===false){
    	echo "<br>No hay stock disponible.</br>";
    }
    if(!isset($_SESSION["login"])){
    	echo "<br>Hay que iniciar sesión para comprar.</br>";
    }
    else{
		$precio_nuevo = 0;

    	$sql3 = "SELECT precio FROM libro WHERE id_Libro=$id";
    	$consulta3 = $db->query($sql3);
    	
    	if($consulta3->num_rows > 0){
    		while($fila3 = mysqli_fetch_assoc($consulta3)){
    			$precio_nuevo = $fila3['precio'];
    		}
    	}

    	$precio_comonuevo = $precio_nuevo*0.8;
    	$precio_buenestado = $precio_nuevo*0.6;
    	$precio_aceptable = $precio_nuevo*0.4;

    	?>
        <br>Precios:</br>
    	<form action ="procesarLibro.php" method="POST">
					
			<select name="precio_libro"> 
			<?php
				if($estado_nuevo === true){
					echo "<option value=$precio_nuevo> Nuevo ($precio_nuevo) </option>";				
				}
						
				if($estado_comonuevo === true){
					echo "<option value=$precio_comonuevo> Como nuevo ($precio_comonuevo) </option>";
				}
			
				if($estado_buenestado === true){
					echo "<option value=$precio_buenestado> Buen estado ($precio_buenestado) </option>";
				}
		
				if($estado_aceptable === true){
					echo "<option value=$precio_aceptable> Aceptable ($precio_aceptable) </option>";
				}
			?>
			</select>			

			<input type="hidden" name="id_libro" value=<?php echo "$id"; ?> >
			<input type="hidden" name="id_usuario" value=<?php echo $_SESSION['id_usuario']; ?> >

			<button type="submit" name ="submit" value ="add_carrito">Añadir al carrito</button>
            
		</form>


    <?php
    }

    $sql_comentario = "SELECT * FROM comentario C WHERE C.id_Libro=$id";
    $consulta_comentario = $db->query($sql_comentario);
    if($consulta_comentario->num_rows > 0){
        echo "<br>Comentarios: </br>";
        while($fila_comentario = mysqli_fetch_assoc($consulta_comentario)){

            $idU = $fila_comentario['id_usuario'];
            $sql_usuario = "SELECT * FROM usuarios U WHERE U.id_usuario=$idU";
            $consulta_usuario = $db->query($sql_usuario);
            if($consulta_usuario->num_rows > 0){
                while($fila_usuario = mysqli_fetch_assoc($consulta_usuario)){
                    $libro->ver_comentario($fila_usuario['usuario'], $fila_usuario['tipo_usuario'], $fila_comentario['descripcionC']);   

                }   //cierra fila_usuario
            }   //cierra consulta_usuario                                    

        }   //cierra fila_comentario
    }   //cierra consulta_comentario (if) 
    else{
        echo "<br>Sin comentarios.</br>";
    }   //cierra consulta_comentario (else)

    ?>

</main>
	
<?php 
require 'pie.php';
?>

</div> <!-- Fin del contenedor -->

</body>

</html>

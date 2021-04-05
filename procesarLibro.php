<?php
	
	require '../comun/BD.php';

	//Se hace siempre
	$BD = new BD('localhost', 'athenea', 'athenea', 'libreria');
	$db = $BD->conectar();

	$id_usuario = $_POST['id_usuario'];
	$id_libro = $_POST['id_libro'];
	$precio_libro = $_POST['precio_libro'];

	$sql = "INSERT INTO carrito VALUES ('$id_usuario', '$id_libro', '$precio_libro')";
	if($db->query($sql) === true){

		header('Location: ../compra/verCarrito.php');
	}

?>
<?php
	session_start();
	session_destroy();
	header('Location: ../comun/index.php');
?>
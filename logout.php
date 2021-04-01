<?php
	session_start();
	session_destroy();
	header('Location: /athenea/AW/index.php');
?>
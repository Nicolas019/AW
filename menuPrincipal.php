	<header id="menuPrincipal">
		
		<ul id="NavHorizontal">
			<li><a href="../comun/index.php"><img src="../comun/imagenes/logo.png" align ="center" width="50" height="50" /> </a></li>
			<li> <a href="../catalogo/biblioteca.php">Biblioteca </a> </li> 
			<li> <a href="../foro/foro.php">Foro </a> </li> 
			<li> <a href="../venta/venta.php">Venta</a> </li>
			<li> <a href="../retos/retos.php">Retos</a>  </li>
			<?php
				session_start();

				if(!isset($_SESSION['login']) || $_SESSION['login'] == false){
					echo "<li id=\"alinearDerecha\"> <a href='../perfil/login.php'><img src='../comun/imagenes/icono_perfil.png'/></a> </li>";
				}
				else{
					echo "<li id=\"alinearDerecha\"><a href='../perfil/perfil.php'><img src='../comun/imagenes/icono_perfil.png'/></a> </li>";
				}
			?>
			<li id="alinearDerecha"> <a href='../compra/carrito.php'><img src='../comun/imagenes/icono_carrito.png'/></a> </li>

			<li id="alinearDerecha"> 

				<form action ="../catalogo/biblioteca.php" method="GET"> 
					
					<input type="text" name="buscar" value="Busqueda">
					<button type="submit" name ="submit" value ="Enviar_form">
						<img src='../comun/imagenes/icono_lupa.png'/>
					</button>

				</form>

				
			</li>

		</ul>   
	</header>
	<nav id="menuPortada">
		
		<ul id="NavHorizontal">

			<li> <a href="biblioteca.php">Biblioteca </a> </li> 
			<li> <a href="foro.php">Foro </a> </li> 
			<li> <a href="venta.php">Venta</a> </li>
			<li> <a href="retos.php">Retos</a>  </li>
			<?php
				session_start();

				if(!isset($_SESSION['login']) || $_SESSION['login'] == false){
					echo "<li id=\"alinearDerecha\"> <a href='login.php'><img src='imagenes/icono_perfil.png' /></a> </li>";
					//echo "<li> <a href='login.php'>Iniciar Sesion</a> </li>";
				}
				else{
					echo "<li id=\"alinearDerecha\"><a href='perfil.php'><img src='imagenes/icono_perfil.png' /></a> </li>";
				}
			?>
			<li id="alinearDerecha"> <a href='carrito.php'><img src='imagenes/icono_carrito.png' /></a> </li>

			<li id="alinearDerecha"> 

				<form action ="biblioteca.php" method="GET" align="center"> 
					
					<input type="text" name="buscar" value="Busqueda">
					<button type="submit" name ="submit" value ="Enviar_form">
						<img src='imagenes/icono_lupa.png'/>
					</button>

				</form>

				
			</li>
		</ul>   
	</nav>
	<nav id="menuPortada">
		
		<ul id="NavHorizontal">
			<li>
				<form action ="index.php" method="GET">
					<select name="opcion"> 
						<option value="Sin Ordenar"> Sin ordenar </option>  
						<option value="Ciencia Ficcion"> Ciencia Ficcion </option>
						<option value="Fantasia"> Fantasia </option>
						<option value="Novela"> Novela </option>
						<option value="Novela Historica"> Novela Historica </option>
						<option value="Novela Policiaca"> Novela Policiaca </option>
						<option value="Romance"> Romance </option>
						<option value="Terror"> Terror </option>
					</select>
					<button type="submit" name ="submit" value ="Enviar_form">
						Enviar
					</button>
				</form>
			</li>
			<li> <a href="biblioteca.php">Biblioteca </a> </li> 
			<li> <a href="foro.php">Foro </a> </li> 
			<li> <a href="venta.php">Venta</a> </li>
			<li> <a href="retos.php">Retos</a>  </li>
			<?php
				session_start();

				if(!isset($_SESSION['login']) || $_SESSION['login'] == false){
					echo "<li> <a href='login.php'><img src='imagenes/icono_perfil.png' align ='right' width='30' height='30' /></a> </li>";
					//echo "<li> <a href='login.php'>Iniciar Sesion</a> </li>";
				}
				else{
					echo "<li><a href='perfil.php'><img src='imagenes/icono_perfil.png' align ='right' width='30' height='30' /></a> </li>";
				}
			?>
			<li> <a href='carrito.php'><img src='imagenes/icono_carrito.png' align ='right' width='30' height='30' /></a> </li>
			<li> Buscar <img src='imagenes/icono_lupa.png' align ='right' width='30' height='30' /></li>
		</ul>   
	</nav>
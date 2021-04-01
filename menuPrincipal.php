	<header id="menuPrincipal">
		
		<ul id="NavHorizontal">
			<li><a href="index.php"><img src="imagenes/logo.png" align ="center" width="50" height="50" /> </a></li>
			<li>
				<form action ="biblioteca.php" method="GET">
					
					<select name="orden"> 
						<option value="Sin Ordenar"> Sin ordenar </option>  
						<option value="Valoracion"> Valoración </option>
						<option value="Alfabetico"> Alfabético </option>
						<option value="Fecha"> Fecha </option>
						<option value="NumPaginas"> Numero de páginas </option>
						<option value = "Ventas">Numero de ventas </option>
					</select>
					<select name="sentido"> 
						<option value="ASC"> Ascendente </option>  
						<option value="DESC"> Descendente</option>
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
			<li> <a href='compra.html'><img src='imagenes/icono_carrito.png' align ='right' width='30' height='30' /></a> </li>
			<li> Buscar <img src='imagenes/icono_lupa.png' align ='right' width='30' height='30' /></li>
		</ul>   
	</header>
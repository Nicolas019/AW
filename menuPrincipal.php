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
			<li> Buscar </li>
			<li> Carrito </li>
			<li> Perfil </li>
		</ul>   
	</header>
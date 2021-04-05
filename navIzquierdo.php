<aside id="filtrosCatalogo">
	<form action ="../catalogo/biblioteca.php" method="GET">
					<h4>
						Ordenar por:
					</h4>
					<select name="orden"> 
						<option value="valoracion"> Valoración </option>
						<option value="titulo"> Alfabético </option>
						<option value="fecha_Lanzamiento"> Fecha </option>
						<option value="numero_Paginas"> Numero de páginas </option>
						<option value = "NumVentas">Numero de ventas </option>
					</select>
					<h4>
						Sentido: 
					</h4>
					<p>
						<select name="sentido"> 
							<option value="ASC"> Ascendente </option>  
							<option value="DESC"> Descendente</option>
						</select>
					</p>
					<h4>
						Genero: 
					</h4>					
						<p> <input type="checkbox" name="Ciencia_Ficcion" value=1> Ciencia Ficcion </p>
						<p> <input type="checkbox" name="Fantasia" value=2> Fantasia </p>
						<p> <input type="checkbox" name="Novela" value=6> Novela </p>
						<p> <input type="checkbox" name="Novela_Historica" value=7> Novela Historica </p>
						<p> <input type="checkbox" name="Novela_Policiaca" value=4> Novela Policiaca </p>
						<p> <input type="checkbox" name="Romance" value=3> Romance </p>
						<p> <input type="checkbox" name="Terror" value=5> Terror	</p>	
					
					<h4> Precio mínimo: </h4>
					<p> <input type="text" name="precioMin" value=0> </p>

					<h4>Precio máximo: </h4>
					<p> <input type="text" name="precioMax" value=100> </p>

					<button type="submit" name ="submit" value ="Enviar_form">
						<img id=filtro src="../comun/imagenes/filtro.png"> 
					</button>
	</form>


</aside>
<aside id="filtrosCatalogo">
	<form action ="biblioteca.php" method="GET">
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
						<p> <input type="checkbox" name="Ciencia_Ficcion" value="Ciencia_Ficcion"> Ciencia Ficcion </p>
						<p> <input type="checkbox" name="Fantasia" value="Fantasia"> Fantasia </p>
						<p> <input type="checkbox" name="Novela" value="Novela"> Novela </p>
						<p> <input type="checkbox" name="Novela_Historica" value="Novela_Historica"> Novela_Historica </p>
						<p> <input type="checkbox" name="Novela_Policiaca" value="Novela_Policiaca"> Novela Policiaca </p>
						<p> <input type="checkbox" name="Romance" value="Romance"> Romance </p>
						<p> <input type="checkbox" name="Terror" value="Terror"> Terror	</p>	
					
					<h4> Precio mínimo: </h4>
					<p> <input type="text" name="precioMin"> </p>

					<h4>Precio máximo: </h4>
					<p> <input type="text" name="precioMax"> </p>

					<button type="submit" name ="submit" value ="Enviar_form">
						<img src="imagenes/filtro.png" width="30" height="30" background_color="white"> 
					</button>
	</form>


</aside>
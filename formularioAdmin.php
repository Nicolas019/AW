<?php 
			
		require_once '../comun/BD.php';
		require_once '../comun/libro.php';
		require_once '../comun/autor.php';
		require_once '../comun/genero.php';
		require_once '../comun/editorial.php';


		$autores = autor::getAutores();
		$editorial = editorial::getEditoriales();
		$genero = genero:: getGeneros();

		$selectAutores = "<select name=autor>" ;
			foreach ($autores as $key => $value) {
				
				$selectAutores.="<option value=$key> $value </option> ";

			}
		$selectAutores.="</select>";
			
		$selectEditorial = "<select name=editorial>" ;
			foreach ($editorial as $key => $value) {
				
				$selectEditorial.="<option value=$key> $value </option>";

			}
		$selectEditorial.="</select>";

		$selectGenero = "<select name=genero>" ;
			foreach ($genero as $key => $value) {
				
				$selectGenero.="<option value=$key> $value </option>";

			}
		$selectGenero.="</select>";


		$libros = libro::getLibros();

		$selectLibros = "<select name=eliminarLibro>" ;
			foreach ($libros as $key => $value) {
				
				$selectLibros.="<option value=$key> $value </option> ";

		}
		$selectLibros.="</select>";


 ?>
	<form action ="../comun/procesarAdmin.php" method="post" enctype="multipart/form-data"> 
					<h4>
						Nuevo Libro:
					</h4>

					<p> Titulo <input type="text" name="titulo" value="" required> </p>
					<p> Autor <?php echo $selectAutores ?>				</p>
					<p> Genero <?php echo $selectGenero ?> </p>
					<p> Precio <input type="text" name="precio" value="" required title="Introduzca un precio válido"> </p>
					<p> Editorial  <?php echo $selectEditorial ?></p>
					<p> Fecha Lanzamiento <input type="date" name="fecha_Lanzamiento" value="" required> </p>
					<p>Numero de páginas <input type="text" name="numero_Paginas" value="" required> </p>
					<p>Sinopsis <input type="textarea" name="sinopsis" value="" required> </p>
					<p>Fichero: <input type= "file" name="imagen" required/></p>
					

					<button type="submit" name ="libroSubmit" value ="Enviar_form">
						Crear 
					</button>
	</form>


	<form action ="../comun/procesarAdmin.php" method="get" > 
					<h4>
						Nuevo Autor:
					</h4>

					<p> Nombre: <input type="text" name="nombreAutor" value="" required> </p>			

					<button type="submit" name ="autorSubmit" value ="Enviar_form">
						Crear 
					</button>
	</form>

	
		<form action ="../comun/procesarAdmin.php" method="get" > 
					<h4>
						Eliminar Libro:
					</h4>

						<p> Libro <?php echo $selectLibros ?>		</p>			

					<button type="submit" name ="eliminarSubmit" value ="Enviar_form">
						Eliminar 
					</button>
	</form>
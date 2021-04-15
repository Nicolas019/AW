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



 ?>




	<form action ="../comun/procesarLibro.php" method="post" enctype="multipart/form-data"> 
					<h4>
						Nuevo Libro:
					</h4>

					<p> Titulo <input type="text" name="titulo" value=""> </p>
					<p> Autor <?php echo $selectAutores ?>				</p>
					<p> Genero <?php echo $selectGenero ?> </p>
					<p> Precio <input type="text" name="precio" value=""> </p>
					<p> Editorial  <?php echo $selectEditorial ?></p>
					<p> Fecha Lanzamiento <input type="date" name="fecha_Lanzamiento" value=""> </p>
					<p> Numero de páginas <input type="text" name="numero_Paginas" value=""> </p>
					<p> Sinopsis <input type="textarea" name="sinopsis" value=""> </p>
					<p>Fichero: <input type= "file" name="imagen"/></p>
					

					<button type="submit" name ="submit" value ="Enviar_form">
						Crear 
					</button>
	</form>
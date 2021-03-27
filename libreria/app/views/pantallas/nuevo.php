<?php

include_once URL_APP . '/views/resources/cabezera.php';

include_once URL_APP . '/views/resources/barra.php';

?>

<div class = 'container-fluid mt-3'>
    <div class = "nuevo_libro ">
        <h3 class = "text-center">Insertar nuevo libro</h3>
        <form action = "<?php echo URL_PROJECT ?> /home/incluir" method="POST">
            <div class = "form-group">
                <select name = "autor" id = "autor" class = "form-control" required>
                    <option value = "">Autor</option>
                    <?php foreach($datos['options']['autor'] as $datosAutor): ?>
                    <option value = "<?php echo $datosAutor->id_Autor ?>"><?php echo $datosAutor->descripcionA ?></option>             
                    <?php endforeach ?>
                </select>
            </div>
            <div class = "form-group">
                <select name = "genero" id = "genero" class = "form-control" required>
                    <option value = "">Genero</option>
                    <?php foreach($datos['options']['genero'] as $datosGenero): ?>
                    <option value = "<?php echo $datosGenero->id_Genero ?>"><?php echo $datosGenero->descripcionG ?></option>             
                    <?php endforeach ?>
                </select>
            </div>
            <div class = "form-group">
                <select name = "editorial" id = "editorial" class = "form-control" required>
                    <option value = "">Editorial</option>
                    <?php foreach($datos['options']['editorial'] as $datosEditorial): ?>
                    <option value = "<?php echo $datosEditorial->id_Editorial ?>"><?php echo $datosEditorial->descripcionE ?></option>             
                    <?php endforeach ?>
                </select>
            </div>
            <div class = "form-group">
                <input type= "text" name = "titulo" id= "titulo" class = "form-control" placeholder="Titulo" required>
            </div>
            <div class = "form-group">
                <input type= "text" name = "precio" id= "precio" class = "form-control" placeholder="Precio" required>
            </div>
            <div class = "form-group">
                <input type= "text" name = "num_pag" id= "num_pag" class = "form-control" placeholder="Numero de Paginas" required>
            </div>
            <div class = "form-group">
                <select name = "valoracion" class = "form-control" required>
                    <option value = "">Valoracion</option>
                    <?php foreach($datos['options']['valoracion'] as $datosVal): ?>  
                    <option value = "<?php echo $datosVal->valoracion ?>"><?php echo $datosVal->descripcionV ?></option>         
                    <?php endforeach ?>
                </select>
            </div>
            <div class = "form-group">
                <input type= "text" name = "resumen" id= "resumen" class = "form-control" placeholder="Resumen" required>
            </div>

            <button class = "btn btn-success btn-block">Incluir Libro</button>
        </form>

    </div>
</div>


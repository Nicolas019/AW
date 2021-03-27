<?php

include_once URL_APP . '/views/resources/cabezera.php';

include_once URL_APP . '/views/resources/barra.php';

?>

<div class = 'container-fluid mt-3'>
    <div class = "eliminar_libro">
        <h3 class = "text-center">Cambiar Valoracion</h3>
        <form action = "<?php echo URL_PROJECT ?> /home/modificarV" method="POST">
        <div class = "form-group">
                <select name = "id" class = "form-control" required>
                    <option value = "">Titulo</option>
                    <?php foreach($datos['libros'] as $datosTitulo): ?>
                    <option value = "<?php echo $datosTitulo->id_Libro ?>"><?php echo $datosTitulo->titulo ?></option>             
                    <?php endforeach ?>
                </select>
            </div>
            <div class = "form-group">
                <select name = "valoracion" class = "form-control" required>
                    <option value = "">Valoracion</option>
                    <?php foreach($datos['options']['valoracion'] as $datosVal): ?>  
                    <option value = "<?php echo $datosVal->valoracion ?>"><?php echo $datosVal->descripcionV ?></option>         
                    <?php endforeach ?>
                </select>
            </div>

            <button class = "btn btn-danger btn-block">Cambiar Valoracion</button>
        </form>

    </div>
</div>



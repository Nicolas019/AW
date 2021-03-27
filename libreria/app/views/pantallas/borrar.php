<?php

include_once URL_APP . '/views/resources/cabezera.php';

include_once URL_APP . '/views/resources/barra.php';

?>

<div class = 'container-fluid mt-3'>
    <div class = "eliminar_libro">
        <h3 class = "text-center">Eliminar Libro</h3>
        <form action = "<?php echo URL_PROJECT ?> /home/eliminar" method="POST">
        <div class = "form-group">
                <select name = "id" class = "form-control" required>
                    <option value = "">Titulo</option>
                    <?php foreach($datos['libros'] as $datosTitulo): ?>
                    <option value = "<?php echo $datosTitulo->id_Libro ?>"><?php echo $datosTitulo->titulo ?></option>             
                    <?php endforeach ?>
                </select>
            </div>

            <button class = "btn btn-danger btn-block">Eliminar Libro</button>
        </form>

    </div>
</div>



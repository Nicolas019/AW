<?php

include_once URL_APP . '/views/resources/cabezera.php';

include_once URL_APP . '/views/resources/barra.php';

?>

<div class = 'container-fluid mt-3'>
    <div class = "eliminar_libro">
        <h3 class = "text-center">Cambiar Precio</h3>
        <form action = "<?php echo URL_PROJECT ?> /home/modificarP" method="POST">
        <div class = "form-group">
                <select name = "id" class = "form-control" required>
                    <option value = "">Titulo</option>
                    <?php foreach($datos['libros'] as $datosTitulo): ?>
                    <option value = "<?php echo $datosTitulo->id_Libro ?>"><?php echo $datosTitulo->titulo ?></option>             
                    <?php endforeach ?>
                </select>
            </div>
            <div class = "form-group">
                <input type= "text" name = "precio" id= "precio" class = "form-control" placeholder="Precio" required>
            </div>

            <button class = "btn btn-danger btn-block">Cambiar Precio</button>
        </form>

    </div>
</div>



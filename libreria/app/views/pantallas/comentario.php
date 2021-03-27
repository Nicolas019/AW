<?php

include_once URL_APP . '/views/resources/cabezera.php';

include_once URL_APP . '/views/resources/barra.php';

?>

<div class = 'container-fluid mt-3'>
    <div class = "nuevo_libro ">
        <h3 class = "text-center">Comenta el libro</h3>
        <form action = "<?php echo URL_PROJECT ?> /home/comentar" method="POST">
            <div class = "form-group">
                <select name = "titulo" class = "form-control" required>
                    <option value = "">Titulo</option>
                    <?php foreach($datos['libros'] as $datosTitulo): ?>
                    <option value = "<?php echo $datosTitulo->id_Libro ?>"><?php echo $datosTitulo->titulo ?></option>             
                    <?php endforeach ?>
                </select>
            </div>
            <div class = "form-group">
                <input type= "text" name = "comentario" class = "form-control" placeholder="Comentario" required>
            </div>

            <button class = "btn btn-success btn-block">Incluir Comentario</button>
        </form>

    </div>
</div>



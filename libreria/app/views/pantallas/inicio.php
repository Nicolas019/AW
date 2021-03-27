<?php

include_once URL_APP . '/views/resources/cabezera.php';

include_once URL_APP . '/views/resources/barra.php';

?>
<div class = 'container-fluid mt-3'>
    <div class = "contenido-acciones-formulario-libros mb-3">
        <div class = "formulario-buscar-titulo mt-3">
        <form action = "<?php echo URL_PROJECT ?> /home" method="POST" class = "form-inline">
                <div class = "form-group mr-2">
                    <input type="search" name ="buscarT" id= "buscarT" class = "form-control" placeholder = "Buscar por Titulo" required>
                </div>
                <div class = "form-group">
                    <button class ="btn btn-success">Buscar</button>
                </div>

            </form>
    </div>
    <div class = "formulario-buscar-autor mt-3">
        <form action = "<?php echo URL_PROJECT ?> /home" method="POST" class = "form-inline">
            <div class = "form-group mr-2">
                <input type="search" name ="buscarA" id= "buscarA" class = "form-control" placeholder = "Buscar por Autor" required>
            </div>
            <div class = "form-group">
                <button class ="btn btn-success">Buscar</button>
            </div>

        </form>
        </div>                       
    <div class = "formulario-buscar-genero m-3">
        <form action = "<?php echo URL_PROJECT ?> /home" method="POST" class = "form-inline">
            <div class = "form-group mr-2">
                <input type="search" name ="buscarG" id= "buscarG" class = "form-control" placeholder = "Buscar por Genero" required>
            </div>
            <div class = "form-group">
                <button class ="btn btn-success">Buscar</button>
            </div>
        </form>
        </div>
    </div>

    <div class = 'tabla-libros'>
        <div class = 'table-responsive'>
            <table class = 'table'>
                <tr>
                        <th>TITULO</th>
                        <th>AUTOR</th>
                        <th>GENERO</th>
                        <th>VALORACION</th>
                        <th>MAS INFORMACION</th>

                </tr>
                <?php foreach ($datos['libros'] as $datosLibros): ?>
                    <tr>
                        <th><?php echo $datosLibros->titulo ?></th>
                        <th><?php echo $datosLibros->descripcionA ?></th>
                        <th><?php echo $datosLibros->descripcionG ?></th>
                        <th><?php echo $datosLibros->descripcionV ?></th>
                        <th>
                            <a href = "<?php echo URL_PROJECT ?>/home/ampliar/<?php echo $datosLibros ->id_Libro ?>" class = "btn btn-info">Ampliar</a>

                        </th>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
</div>


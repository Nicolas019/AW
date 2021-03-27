<?php

include_once URL_APP . '/views/resources/cabezera.php';

include_once URL_APP . '/views/resources/barra.php';

?>
<div class = 'container-fluid mt-3'>
    <div class = 'tabla-vista-libros-acciones'>
        <div class = 'table-responsive'>
            <table class = 'table'>
                <tr>
                        <th>ID</th>
                        <th>TITULO</th>
                        <th>AUTOR</th>
                        <th>GENERO</th>
                        <th>EDITORIAL</th>
                        <th>PRECIO</th>
                        <th>NUMERO DE PAGINAS</th>
                        <th>VALORACION</th>
                        <th>RESUMEN</th>


                </tr>
                <?php foreach ($datos['libros'] as $datosLibros): ?>
                    <tr>
                        <th><?php echo $datosLibros->id_Libro ?></th>
                        <th><?php echo $datosLibros->titulo ?></th>
                        <th><?php echo $datosLibros->descripcionA ?></th>
                        <th><?php echo $datosLibros->descripcionG ?></th>
                        <th><?php echo $datosLibros->descripcionE ?></th>
                        <th><?php echo $datosLibros->precio ?></th>
                        <th><?php echo $datosLibros->numero_Paginas ?></th>
                        <th><?php echo $datosLibros->descripcionV ?></th>
                        <th><?php echo $datosLibros->resumen ?></th>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
    <div class = 'tabla-comentarios'>
        <div class = 'table-responsive'>
            <table class = 'table'>
                <tr>
                        <th>COMENTARIOS</th>
                </tr>
                <?php foreach ($datos['comen'] as $datosLibros): ?>
                    <tr>
                        <th><?php echo $datosLibros->descripcionC ?></th>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
</div>


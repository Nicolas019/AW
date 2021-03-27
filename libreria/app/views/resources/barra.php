

<header>
<div class = 'cuadro-fluid mt-3'>
    <div class = "barra-opciones mb-3">
        <div class = "boton-crear-nuevo-libro">
        <form action = "<?php echo URL_PROJECT ?> /home/nuevo">
            <div class = "form-group">
                <button class ="btn">Inluir Libro</button>
            </div>
        </form>
        </div>
        <div class = "boton-eliminar-libro">
        <form action = "<?php echo URL_PROJECT ?> /home/borrar">
            <div class = "form-group">
                <button class ="btn">Eliminar Libro</button>
            </div>
        </form>
        </div>
        <div class = "boton-modificar-precio">
        <form action = "<?php echo URL_PROJECT ?> /home/modifP">
            <div class = "form-group">
                <button class ="btn">Modificar Precio</button>
            </div>
        </form>
        </div>
        <div class = "boton-modificar-valoracion">
        <form action = "<?php echo URL_PROJECT ?> /home/modifV">
            <div class = "form-group">
                <button class ="btn">Modificar Valoracion</button>
            </div>
        </form>
        </div>
        <div class = "boton-comentar">
            <form action = "<?php echo URL_PROJECT ?>/home/comentarios">
                <div class = "form-group">
                    <button class ="btn ">Comentar Libro</button>
                </div>

            </form>
        </div>
        <div class = "boton-inicio">
            <form action = "<?php echo URL_PROJECT ?>">
                <div class = "form-group">
                    <button class ="btn ">Inicio</button>
                </div>

            </form>
        </div>
    </div>
</header>
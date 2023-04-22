<div class="contenedorInicio">
    <a href="../login/" class="enlace derecha">&laquo; Volver atrás</a>  
</div>
<form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
    <fieldset>
        <h2>Recuperar Contraseña</h2>
        <h3 class="subtitulo">Introduzca su DNI y se le enviará un mensaje al email con su nueva contraseña.</h3>
        <div class="contenedorCampos">
            <input class="DNI" type="text" name="DNI" placeholder="Introduzca el DNI">
        </div>
        <div class="contenedorBotones">
            <input class="estilo-boton boton-principal" type="submit" name="recuperar" value="Enviar">
        </div>
    </fieldset>
</form>
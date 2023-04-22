    <div class="contenedorInicio">
        <a href="../" class="enlace" draggable="false">&laquo; Inicio</a>  
    </div>
<form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
    <fieldset>
        <h2>Iniciar Sesión</h2>
        <div class="contenedorCampos">
            <label class="campo">DNI:</label>
            <input class="DNI" type="text" name="DNI">
        </div>
        <div class="contenedorCampos">
            <label class="campo">Contraseña:</label>
            <input class="contraseña" type="password" name="contraseña">
        </div>
        <div class="contenedorBotones">
            <input class="estilo-boton boton-principal" type="submit" name="login" value="Iniciar Sesión">
            <a href="../recuperarContraseña" class="estilo-boton boton-secundario" id="tButContraseña" draggable="false">¿Has olvidado tu contraseña?</a>
        </div>
    </fieldset>
</form>
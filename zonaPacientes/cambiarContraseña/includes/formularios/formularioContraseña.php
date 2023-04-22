<form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
    <fieldset>
        <h2>Cambiar contraseña actual:</h2>
        <div class="contenedorCampos">
            <input class="contraseña" type="password" name="contraseña" placeholder="Contraseña" />
            <input class="contraseña" type="password" name="confirmarContraseña" placeholder="Repita la contraseña" />    
        </div>
        <div class="contenedorBotones">
            <input type="submit" class="estilo-boton boton-principal" name="enviar" value="ENVIAR" />
        </div>
    </fieldset>
</form>
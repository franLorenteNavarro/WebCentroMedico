<div class="contenedorInicio">
    <a href="../" class="enlace" draggable="false">&laquo; Inicio</a>  
</div>
<form name="formRegistro" action="<?php $_SERVER["PHP_SELF"] ?>" onsubmit="return validateForm()" method="POST">
    <ul class="barraProgreso">
    <li class="puntero">Datos Personales</li>
    <li id="puntero2">Contacto</li>
    <li id="puntero3">Datos de inicio de sesión</li>
    </ul>
    <fieldset>
        <div id="parte1">
            <h2 class="titulo">Datos personales</h2>
            <h3 class="subtitulo">Introduzca su nombre, apellidos y fecha de nacimiento</h3>
            <input type="text" name="nombre" placeholder="Nombre" <?php mostrarCampos("nombre") ?> />
            <input type="text" name="apellidos" placeholder="Apellidos" <?php mostrarCampos("apellidos") ?> />
            <input type="text" name="fechaNacimiento" placeholder="Fecha de nacimiento (dd-mm-YYYY)" <?php mostrarCampos("fechaNacimiento") ?> />
            <input type="button" name="siguiente" id="tBotonSiguiente1" class="siguiente estilo-boton boton-secundario" value="&raquo;" />
        </div>
        <div id="parte2">
            <h2 class="titulo">Datos de contacto</h2>
            <h3 class="subtitulo">Rellene los campos para poder ponernos en contacto con usted si fuera necesario</h3>
            <input type="text" name="email" placeholder="Email" <?php mostrarCampos("email") ?> />
            <input type="number" name="telefono" placeholder="Número de teléfono" <?php mostrarCampos("telefono") ?> />
            <input type="text" name="direccion" placeholder="Dirección del domicilio" <?php mostrarCampos("direccion") ?> />
            <input type="button" name="volverAtras" id="tBotonAnterior1" class="atras estilo-boton boton-secundario" value="&laquo;" />
            <input type="button" name="siguiente" id="tBotonSiguiente2" class="siguiente estilo-boton boton-secundario" value="&raquo;" />
        </div>
        <div id="parte3">
            <h2 class="titulo">Datos de inicio de sesión</h2>
            <h3 class="subtitulo">Ya casi hemos terminado, solo introduzca su DNI y una contraseña válida e inicie sesión</h3>
            <input type="text" name="DNI" placeholder="DNI" <?php mostrarCampos("DNI") ?> />
            <input type="password" name="contraseña" placeholder="Contraseña" />
            <input type="password" name="confirmarContraseña" placeholder="Confirmar Contraseña" />
            <input type="button" name="volverAtras" id="tBotonAnterior2" class="atras estilo-boton boton-secundario" value="&laquo;" />
            <input type="submit" id="submitEnviar" name="registrar" class="estilo-boton boton-principal" value="ENVIAR" />
        </div>
    </fieldset>
</form>
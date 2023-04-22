<div class="contenedorInicio">
    <?php
        if (!comprobarBaja()) {
            echo'<form class="formularioNone" action="'.$_SERVER["PHP_SELF"].'" method="POST">';
                echo'<button class="estilo-boton boton-eliminar" id="botonBaja" name="solicitarBaja">DARSE DE BAJA</button>';
            echo'</form>';
            echo'<div class="contenedorEliminar">';
                echo'<button class="estilo-boton boton-eliminar" onclick="mostrarAlertaBaja()">DARSE DE BAJA</button>';
            echo'</div>';
        } else {
            echo'<div class="contenedorEliminar">';
                echo'<button class="estilo-boton boton-warning">BAJA EN PROCESO</button>';
            echo'</div>';
        }
    ?>
</div>
<form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
    <fieldset>
        <h2>Usuario: <?php echo $_SESSION["usuario"] ?> </h2>
        <div class="contenedorCampos">
            <label for="">Nombre:</label><input class="campo" type="text" disabled name="nombre" placeholder="Nombre" <?php mostrarCampos("nombre") ?> value="<?php echo($_SESSION["datosUsuario"][0]) ?>" />
            <label for="">Apellidos:</label><input class="campo" type="text" disabled name="apellidos" placeholder="Apellidos" <?php mostrarCampos("apellidos") ?> value="<?php echo($_SESSION["datosUsuario"][1]) ?>" />
            <label for="">Fecha Nacimiento:</label><input class="campo" type="text" disabled name="fechaNacimiento" placeholder="Fecha de nacimiento (dd-mm-YYYY)" <?php mostrarCampos("fechaNacimiento") ?> value="<?php echo($_SESSION["datosUsuario"][2]) ?>" />
            <label for="">Email:</label><input class="campo" type="text" name="email" disabled placeholder="Email" <?php mostrarCampos("email") ?> value="<?php echo($_SESSION["datosUsuario"][3]) ?>" />
            <label for="">Telefono:</label><input class="campo" type="text" name="telefono" disabled placeholder="Número de telefono" <?php mostrarCampos("telefono") ?> value="<?php echo($_SESSION["datosUsuario"][4]) ?>" />
            <label for="">Dirección:</label><input class="campo" type="text" name="direccion" disabled placeholder="Dirección del domicilio" <?php mostrarCampos("direccion") ?> value="<?php echo($_SESSION["datosUsuario"][5]) ?>" />
            <div class="contenedorEditar">
                <div class="estilo-boton boton-info" id="botonEditar" onclick="liberarFormulario()">EDITAR</div>
                <input class="estilo-boton boton-principal" type="submit" id="botonGuardar" name="editar" value="Guardar Cambios" />
            </div>
            </fieldset>
        </form>
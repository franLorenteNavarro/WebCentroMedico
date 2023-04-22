<div class="contenedorInicio">
    <?php        
        echo'<form class="formularioNone" action="'.$_SERVER["PHP_SELF"].'" method="POST">';
            echo'<button class="estilo-boton boton-eliminar" id="botonBaja" name="eliminarMedico">ELIMINAR</button>';
        echo'</form>';
        echo'<div class="contenedorEliminar">';
            echo'<button class="estilo-boton boton-eliminar" onclick="mostrarAlertaBaja()">ELIMINAR</button>';
        echo'</div>';        
    ?>
</div>
<form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
    <fieldset>
        <h2>Editar Médico - <?php echo $_SESSION['medicoSeleccionado'] ?> </h2>
        <div class="contenedorCampos">
            <label for="">Nombre:</label><input class="campo" type="text" disabled id="pacopepe" name="nombre" placeholder="Nombre" <?php mostrarCampos("nombre") ?> value="<?php echo($_SESSION["datosUsuario"][0]) ?>" />
            <label for="">Apellidos:</label><input class="campo" type="text" disabled name="apellidos" placeholder="Apellidos" <?php mostrarCampos("apellidos") ?> value="<?php echo($_SESSION["datosUsuario"][1]) ?>" />
            <label for="">Especialidad:</label><input class="campo" type="text" disabled name="especialidad" placeholder="Especialidad" <?php mostrarCampos("especialidad") ?> value="<?php echo($_SESSION["datosUsuario"][2]) ?>"/>
            <div class="contenedorEditar">
                <div class="estilo-boton boton-info" id="botonEditar" onclick="liberarFormulario()">EDITAR</div>
                <input class="estilo-boton boton-principal" id="botonGuardar" type="submit" name="enviar" value="Guardar Cambios" />
            </div>
        </div>
    </fieldset>
</form>
<form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
    <fieldset>
        <h2>Añadir Nuevo Médico</h2>
        <div class="contenedorCampos">
            <label for="">DNI:</label><input class="campo" type="text" name="DNI" placeholder="DNI" <?php mostrarCampos("DNI") ?> />
            <label for="">Nombre:</label><input class="campo" type="text" name="nombre" placeholder="Nombre" <?php mostrarCampos("nombre") ?> />
            <label for="">Apellidos:</label><input class="campo" type="text" name="apellidos" placeholder="Apellidos" <?php mostrarCampos("apellidos") ?> />
            <label for="">Especialidad:</label><input class="campo" type="text" name="especialidad" placeholder="Especialidad" <?php mostrarCampos("especialidad") ?> />
            <div class="contenedorEditar">
                <input class="estilo-boton boton-principal" type="submit" name="enviar" value="Añadir" />
            </div>
        </div>
    </fieldset>
</form>
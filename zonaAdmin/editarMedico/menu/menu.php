<div class="contenedorMenu">
    <div class="menu">
        <div class="CerrarMenuInterno"><img class="cerrarMenuImagen" src="../general/menu/imagenes/cancelar.png" alt="cancelar.png"></div>
        <ul>
            <li onclick="window.location='../bajaUsuarios';"><img src="../general/menu/imagenes/eliminar.png" alt=""><label for="" class="opcionMenu">Baja Usuarios</label></li>
            <li onclick="window.location='../añadirMedico';" ><img src="../general/menu/imagenes/añadir.png" alt=""><label for="" class="opcionMenu">Añadir Nuevo Médico</label></li>
            <li onclick="window.location='../listaEspecialistas';"><img src="../general/menu/imagenes/editar.png" alt=""><label for="" class="opcionMenu">Editar Médico</label></li>
            <li onclick="mandarFormulario()"><img src="../general/menu/imagenes/cerrarSesion.png" alt=""><label for="" class="opcionMenu">Cerrar Sesión</label></li>
        </ul>
    </div>
</div>
<form id="formCerrarSesion" action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
    <input id="botonCerrarSesion" type="submit" class="enlace" name="desconectar" value="Cerrar Sesión" />
</form>
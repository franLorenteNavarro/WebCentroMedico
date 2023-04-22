<?php if (!comprobarContraseñaGenerica()) { ?>
    <div class="contenedorMenu">
        <div class="menu">
            <div class="CerrarMenuInterno"><img class="cerrarMenuImagen" src="../general/menu/imagenes/cancelar.png" alt=""></div>
            <ul>
                <li class="listaOpcionMenu" onclick="window.location='../listaEspecialistas';"><img src="../general/menu/imagenes/calendario.png" alt=""><label for="" class="opcionMenu">Pedir Cita</label></li>
                <li class="listaOpcionMenu" onclick="window.location='../citasPendientes';"><img src="../general/menu/imagenes/reloj.png" alt=""><label for="" class="opcionMenu">Citas Pendientes</label></li>
                <li class="listaOpcionMenu" onclick="window.location='../miCuenta';" ><img src="../general/menu/imagenes/avatar.png" alt=""><label for="" class="opcionMenu">Mi Cuenta</label></li>
                <li class="listaOpcionMenu" onclick="window.location='./';"><img src="../general/menu/imagenes/candado-open.png" alt=""><label for="" class="opcionMenu">Cambiar Contraseña</label></li>
                <li class="listaOpcionMenu" onclick="mandarFormulario()"><img src="../general/menu/imagenes/cerrarSesion.png" alt=""><label for="" class="opcionMenu">Cerrar Sesión</label></li>
            </ul>
        </div>
    </div>
<?php }else{ ?>
<div class="contenedorMenu">
    <div class="menu">
        <div class="CerrarMenuInterno"><img class="cerrarMenuImagen" src="../general/menu/imagenes/cancelar.png" alt=""></div>
        <ul>
            <li><img src="../general/menu/imagenes/invisible.png" alt=""><label for="" class="opcionMenu"></label></li>
            <li><img src="../general/menu/imagenes/invisible.png" alt=""><label for="" class="opcionMenu"></label></li>
            <li><img src="../general/menu/imagenes/invisible.png" alt=""><label for="" class="opcionMenu"></label></li>
            <li><img src="../general/menu/imagenes/invisible.png" alt=""><label for="" class="opcionMenu"></label></li>
            <li class="listaOpcionMenu listaOpcionMenuDesabilitado" onclick="mandarFormulario()"><img src="../general/menu/imagenes/cerrarSesion.png" alt=""><label for="" class="opcionMenu">Cerrar Sesión</label></li>
        </ul>
    </div>
</div>
<?php } ?>
<form id="formCerrarSesion" action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
    <input id="botonCerrarSesion" type="submit" class="enlace" name="desconectar" value="Cerrar Sesión" />
</form>
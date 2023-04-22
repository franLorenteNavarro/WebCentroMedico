<div class="contenedorMenu">
    <div class="menu">
        <div class="CerrarMenuInterno"><img class="cerrarMenuImagen" src="./general/menu/imagenes/cancelar.png" alt=""></div>
        <ul>
            <li><img src="./general/menu/imagenes/invisible.png" alt=""><label for="" class="opcionMenu"></label></li>
            <li><img src="./general/menu/imagenes/invisible.png" alt=""><label for="" class="opcionMenu"></label></li>
            <li><img src="./general/menu/imagenes/invisible.png" alt=""><label for="" class="opcionMenu"></label></li>
            <li><img src="./general/menu/imagenes/invisible.png" alt=""><label for="" class="opcionMenu"></label></li>
            <li class="listaOpcionMenu listaOpcionMenuDesabilitado" onclick="mandarFormulario()"><img src="./general/menu/imagenes/cerrarSesion.png" alt=""><label for="" class="opcionMenu">Cerrar Sesión</label></li>
        </ul>
    </div>
</div>
<form id="formCerrarSesion" action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
    <input id="botonCerrarSesion" type="submit" class="enlace" name="desconectar" value="Cerrar Sesión" />
</form>
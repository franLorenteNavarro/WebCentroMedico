<?php

function cambiarContraseña() {
    $conexion = abrirConexion();  
    $usuario = ($_SESSION["usuario"]);
    $contraseña= md5($_POST["contraseña"]);

    $sql="UPDATE paciente SET contraseña='$contraseña', cambiarContraseña='no' WHERE DNI = '$usuario'";
    $consulta = $conexion->query($sql);
}

?>
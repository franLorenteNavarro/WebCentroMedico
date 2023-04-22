<?php

function comprobarLoginAdmin() {
    $conexion = abrirConexion();    
    $usuario= ($_POST['DNI']);
    $contraseña= md5($_POST['contraseña']);

    if ($usuario == "admin" && $contraseña == md5("admin")) {
        return true;
    } else {
        return false;
    }    
}

function comprobarLoginPaciente() {
    $conexion = abrirConexion();    
    $usuario= ($_POST['DNI']);
    $contraseña= ($_POST['contraseña']);
    
    $sql="SELECT * FROM paciente WHERE DNI = '$usuario' and contraseña = '$contraseña'";
    $consulta = $conexion->query($sql);    

    $contador = $consulta->rowCount();
    if ($contador>0) {
        return true;
    } else {
        return false;
    }          
}

function comprobarLoginMedico() {
    $conexion = abrirConexion();    
    $usuario= ($_POST['DNI']);
    $contraseña= ($_POST['contraseña']);

    $sql="SELECT * FROM medico WHERE DNI = '$usuario' and contraseña = '$contraseña'";
    $consulta = $conexion->query($sql);    

    $contador = $consulta->rowCount();
    if ($contador>0) {
        return true;
    } else {
        return false;
    }    
}

?>
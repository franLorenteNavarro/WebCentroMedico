<?php

function generarContraseña() {
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10); 
}

function generarEmail($email, $contraseñaTemporal) {
    $asunto = "NUEVA CONTRASEÑA GENERADA";
    $headers = "From: CENTRO MEDICO RAMON ARCAS <centromedicoramonarcas@gmail.com>\r\n";
    $cuerpo = "Su nueva contraseña temporal es: $contraseñaTemporal, por su seguridad se recomienda que la cambie cuanto antes. ¡Saludos! \n Acceso: http://localhost/centromedico/login/";

    if(mail($email,$asunto,$cuerpo,$headers)){
        ?> <script src="./javascript/exito.js"></script> <?php
    }else{
        ?> <script src="./javascript/error.js"></script> <?php
    }
}

function cambiarContraseña() {
    $conexion = abrirConexion();
    $DNI = $_POST["DNI"];
    $contraseñaTemporal = generarContraseña();
    $contraseñaTemporalMD5 = md5("$contraseñaTemporal");

    $sql1="SELECT * FROM paciente WHERE DNI = '$DNI'";
    $consulta1 = $conexion->query($sql1);
    $contador1 = $consulta1->rowCount();
    
    $sql2="SELECT * FROM medico WHERE DNI = '$DNI'";
    $consulta2 = $conexion->query($sql2);
    $contador2 = $consulta2->rowCount();

    if ($contador1>0) {
        $sql3="UPDATE paciente SET contraseña = '$contraseñaTemporalMD5', cambiarContraseña='si' WHERE DNI = '$DNI'";
        $consulta3 = $conexion->query($sql3);
        $array = $consulta1->fetch();                
        $email = $array["email"];        
        generarEmail($email, $contraseñaTemporal);
        return true;
    } else if ($contador2>0) {
        $sql4="UPDATE medico SET contraseña = '$contraseñaTemporalMD5', cambiarContraseña='si' WHERE DNI = '$DNI'";
        $consulta4 = $conexion->query($sql4);
        $array = $consulta2->fetch();                
        $email = $array["email"];        
        generarEmail($email, $contraseñaTemporal);
        return true;
    } else {
        return false;
    }   
}

?>
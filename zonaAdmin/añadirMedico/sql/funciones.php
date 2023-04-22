<?php

function comprobarUsuario() {
    $conexion = abrirConexion();    
    $usuario= ($_POST['DNI']);
    
    $sql1="SELECT * FROM paciente WHERE DNI = '$usuario'";
    $consulta1 = $conexion->query($sql1);    
    $contador1 = $consulta1->rowCount();
    
    $sql2="SELECT * FROM medico WHERE DNI = '$usuario'";
    $consulta2 = $conexion->query($sql2);    
    $contador2 = $consulta2->rowCount();

    if ($contador1>0 || $contador2>0) {
        return true;
    } else {
        return false;
    }          
}

function ingresarDatos() {
    $conexion = abrirConexion();    
    $DNI = strtoupper($_POST['DNI']);
    $contraseña = ($DNI);
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $especialidad = $_POST["especialidad"];
    
    $sql="INSERT INTO medico(DNI, contraseña, especialidad, nombre, apellidos) VALUES ('$DNI', '$contraseña', '$especialidad', '$nombre', '$apellidos')";
    $consulta = $conexion->query($sql);  
}

?>
<?php

function recuperarDatos() {
    $conexion = abrirConexion();    
    $medico= ($_SESSION['medicoSeleccionado']);
    
    $sql="SELECT nombre, apellidos, especialidad FROM medico WHERE DNI = '$medico'";
    $consulta = $conexion->query($sql);
    while($row = $consulta->fetch()){                    
        $_SESSION["datosUsuario"] = [$row["nombre"],$row["apellidos"],$row["especialidad"]];
    }    
}

function actualizarDatos() {
    $conexion = abrirConexion();    
    $medico= ($_SESSION['medicoSeleccionado']);
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $especialidad = $_POST["especialidad"];
    
    $sql="UPDATE medico SET nombre = '$nombre', apellidos = '$apellidos', especialidad = '$especialidad' WHERE DNI = '$medico'";
    $consulta = $conexion->query($sql);  
}

function eliminarMedico() {
    $conexion = abrirConexion();    
    $medico= ($_SESSION['medicoSeleccionado']);   
    
    $sql1="DELETE FROM cita WHERE medico = '$medico'";
    $consulta1 = $conexion->query($sql1);    

    $sql2="DELETE FROM medico WHERE DNI = '$medico'";
    $consulta2 = $conexion->query($sql2);    
}

?>
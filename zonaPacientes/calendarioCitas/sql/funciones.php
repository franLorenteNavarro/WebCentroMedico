<?php

function comprobarCita() {
    $conexion = abrirConexion();

    $medico = $_SESSION['medicoSeleccionado'];
    $hora = $_POST['horasDisponibles'];
    $horaActual = date('H:i');
    $fechaSeleccionada = $_POST['fechaSeleccionada'];
    $fechaActual = date('Y')."-".(int)date('m')."-".date('d');

    $sql="SELECT * FROM cita WHERE medico='$medico' AND fecha='$fechaSeleccionada' AND hora='$hora'";
    $consulta = $conexion->query($sql);
    $contador = $consulta->rowCount();

    if ($contador>0) {
        return true;
    }else if ($fechaSeleccionada == $fechaActual) {
        if ($hora <= $horaActual) {
            return true;
        }
    } 
    else {
        return false;
    }
}

function pedirCita() {
    $conexion = abrirConexion();

    $medico = $_SESSION['medicoSeleccionado'];
    $usuario = $_SESSION['usuario'];
    $hora = $_POST['horasDisponibles'];
    $fechaSeleccionada = $_POST['fechaSeleccionada'];

    $sql="INSERT INTO cita(`paciente`, `medico`, `fecha`, `hora`) VALUES ( '$usuario', '$medico', '$fechaSeleccionada', '$hora')";
    $consulta = $conexion->query($sql);
}

?>
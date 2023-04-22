<?php

//Importamos la conexion
include_once 'db.php';

class Consulta extends DB {   

    //Funciones que realizan la consulta a la base de datos y nos devuelven el resultado
    function consultaCitas() {
        $medico = $_SESSION['medicoSeleccionado'];

        $consulta = $this->connect()->query("SELECT fecha, hora FROM cita WHERE medico = '$medico'");
        return $consulta;
    }

    //Utilizo marcadores como (:fecha) que sustituyo posteriormente en la consulta preparada por la variable introducida, para evitar inyecciones sql
    function consultaHoras($fecha) {
        $medico = $_SESSION['medicoSeleccionado'];

        $consulta = $this->connect()->prepare("SELECT hora FROM cita WHERE medico = '$medico' AND fecha= :fecha");
        $consulta->execute(['fecha' => $fecha]);
        return $consulta;
    }
}

?>
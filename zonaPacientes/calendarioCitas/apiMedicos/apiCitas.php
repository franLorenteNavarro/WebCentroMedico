<?php

//Incluimos la conexion
include_once 'consultas.php';

//Se crea la api codigos postales
class apiCitas {
    //Declaramos las funciones
    function obtenerCitas() {
        //Creamos un objeto de la clase consulta, un array y almacenamos el resultado de la funcion de consulta en $resultado
        $cita = new Consulta();
        $citas["citas_disponibles"] = array();

        $resultado = $cita->consultaCitas();

        //Con la funcion rowCount nos aseguramos de que la consulta devuelve datos, sino mostramos error
        if ($resultado->rowCount()) {
            //Utilizamos un bucle while para crear un array asociativo, en el que declaramos una key y un value
            while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $item = array(
                    "fecha" => $row["fecha"],
                    "hora" => $row["hora"]
                );
                array_push($citas["citas_disponibles"], $item);
            }
            //Con esta funcion parseamos el array a JSON
            $this->printJSON($citas);
            
        } else {            
            //Con esta funcion mostramos un error en JSON
            $this->error("");
        }
    }

    function obtenerHoras($fecha) {

        $hora = new Consulta();
        $horas["citas_disponibles"] = array();

        $resultado = $hora->consultaHoras($fecha);

        if ($resultado->rowCount()) {
            while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $item = array(
                    "hora" => $row["hora"]
                );
                array_push($horas["citas_disponibles"], $item);
            }
            $this->printJSON($horas);
            
        } else {  
            //Aquí gestionamos dos tipos de error, el primero si no se pasan elementos a la api, y el segundo en caso de no contemplarse en la base de datos          
            if (empty($fecha)) {
                $this->error("");
            } else {
                $this->error("");
            } 
        }
    }
    
    //Esta función permite parsear los arrays a JSON
    function printJSON($array) {
        echo json_encode($array);
    }
    
    //Esta función permite mostrar un mensaje de error en JSON
    function error($mensaje) {
        echo json_encode(array('citas_disponibles' => $mensaje));
    }  
}

?>
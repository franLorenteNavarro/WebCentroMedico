<?php

function abrirConexion() {
    try{
        $conexion = new PDO("mysql:host=localhost;dbname=centromedico", "root", "");
    
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        //Mostramos un error al usuario en caso de no conectar la base de datos
        die("<p class='errorSQL'>ERROR CATASTRÓFICO: No se puede conectar. " . $e->getMessage()) . "</p>";
    }
    return $conexion;
}

?>
<?php
    session_start();
    include '../../../general/sql/conexion.php';
    include '../../../general/sql/funciones.php';
    
    if (!isset($_SESSION["usuario"]) || !isset($_SESSION["medicoSeleccionado"])) {
        header( "Location:../" );
    } else {
        if (comprobarContraseñaGenerica()) {
            header("Location:../../cambiarContraseña");
        }
        $rol = comprobarRol();
        if ($rol=="paciente") {
            $conexion = abrirConexion();
            if (comprobarCitas()) {
                header("Location:../");
            } else {                        
                //Importamos la clase apiCP
                include_once "apiCitas.php";

                //Declaramos un nuevo objeto de la clase api
                $api = new apiCitas();

                //Condicionales que llaman a la funcion en base a lo obtenido con get
                if (isset($_GET["fecha"])) {
                    $fecha = $_GET["fecha"];
                    $api->obtenerHoras($fecha);
                } 
                else {
                    $api->obtenerCitas();
                }
            }
            
        } else if ($rol=="admin") {
            header("Location:../../../zonaAdmin/");
        } else if ($rol=="medico") {
            header("Location:../../../zonaMedicos/");
        }                
    }                      
?>
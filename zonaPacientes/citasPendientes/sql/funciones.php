<?php
function comprobarlista(){
    $conexion = abrirConexion();
    $usuario = ($_SESSION['usuario']);   
    $fechaActual = date('Y-m-d');
    $lista = false;
    $sql="SELECT * FROM cita WHERE paciente='$usuario'";
    $consulta = $conexion->query($sql);

    if($consulta->rowCount() > 0){
        while($row = $consulta->fetch()){            
            if ($row['fecha'] >= $fechaActual) {
                return true;
            }
        }
    }else{
        return false;
    }
    return $lista;
}
function listarCitas() {
    $conexion = abrirConexion();
    $usuario = ($_SESSION['usuario']);   
    $fechaActual = date('Y-m-d');
    
    $sql="SELECT * FROM cita WHERE paciente='$usuario'";
    $consulta = $conexion->query($sql);

    if(comprobarlista()){
        echo"<div class='contenedorGeneralCitas'>";
        while($row = $consulta->fetch()){            
            if ($row['fecha'] >= $fechaActual) {
                $medico = $row['medico'];                  
                
                $sql2="SELECT nombre, apellidos, especialidad FROM medico WHERE DNI='$medico'";
                $consulta2 = $conexion->query($sql2);
                $array = $consulta2->fetch();
                
                $nombreMedico = $array['nombre'];
                $apellidosMedico = $array['apellidos'];
                $especialidadMedico = $array['especialidad'];
                $fecha = date("d-m-Y",strtotime($row['fecha']));
                $hora = $row['hora'];
                $idCita = $row['id'];
    
                echo "<div class='contenedorCita'>";
                    echo "<div class='contenedorImg'><img src='../general/includes/imagenes/cita.png'></div>";
                    echo "<div class='contenedorInfo'>";
                        echo "<div>$nombreMedico</div>";
                        echo "<div>$apellidosMedico</div>";
                        echo"<hr>";
                        echo "<div>$especialidadMedico</div>";
                        echo "<div>$fecha / $hora</div>";
                    echo"</div>";
                    echo "<div class='contenedorBotones'><button class='estilo-boton boton-eliminar' onclick='mostrarAlertaCita($idCita)'>Cancelar</button></div>";
                    echo"<form class='formularioNone' action='".$_SERVER["PHP_SELF"]."' method='POST'>";
                        echo "<input type='hidden' name='citaSeleccionada' value='$idCita'>";
                        echo "<input type='submit' id='formCita$idCita' name='cancelarCita' value='Cancelar Cita'>";
                    echo"</form>";                    
                echo "</div>";
            }
        }        
        echo"</div>";
    }
     else {
        echo "<div class='noCitas'><div>NO HAY CITAS</div></div>";
    }    
}

function cancelarCita() {
    $conexion = abrirConexion();
    $id = $_POST['citaSeleccionada'];   
    
    $sql="DELETE FROM `cita` WHERE id = '$id'";
    $consulta = $conexion->query($sql);    
}


?>
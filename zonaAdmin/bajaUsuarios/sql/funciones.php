<?php

function listarBajas() {
    $conexion = abrirConexion();
    
    $sql="SELECT * FROM paciente WHERE solicitarBaja='si'";
    $consulta = $conexion->query($sql);

    if($consulta->rowCount() > 0){
        echo"<div class='contenedorGeneralCitas'>";
        while($row = $consulta->fetch()){        
            $DNI = $row['DNI'];
            $nombre = $row['nombre'];
            $apellidos = $row['apellidos'];

            echo "<div class='contenedorCita'>";
                echo "<div class='contenedorImg'><img src='../general/includes/imagenes/cita.png'></div>";
                echo "<div class='contenedorInfo'>";
                    echo "<div>$nombre</div>";
                    echo "<div>$apellidos</div>";
                    echo "<hr/>";
                    echo "<div>$DNI</div>";
                echo"</div>";
                echo "<div class='contenedorBotones'><button class='estilo-boton boton-eliminar' onclick='mostrarAlertaBaja(`$DNI`)'>Eliminar</button></div>";
                echo"<form class='formularioNone' action='".$_SERVER["PHP_SELF"]."' method='POST'>";
                    echo "<input type='hidden' name='usuarioSeleccionado' value='$DNI'>";
                    echo "<input type='submit' id='inpBaja$DNI' name='darBaja' value='Eliminar'>";
                    echo "<input type='submit' id='inpDenegarBaja$DNI' name='denegarBaja' value='Denegar'>";
                echo"</form>";                    
            echo "</div>";           
        }        
        echo"</div>";
    }
     else {
        echo "<div class='noCitas'><div>NO HAY BAJAS</div></div>";
    }    
}

function eliminarUsuario() {
    $conexion = abrirConexion();
    $DNI = $_POST['usuarioSeleccionado'];   
    
    $sql1="DELETE FROM cita WHERE paciente = '$DNI'";
    $consulta1 = $conexion->query($sql1);    

    $sql2="DELETE FROM paciente WHERE DNI = '$DNI'";
    $consulta2 = $conexion->query($sql2);    
}

function denegarBaja() {
    $conexion = abrirConexion();
    $DNI = $_POST['usuarioSeleccionado'];   
    
    $sql="UPDATE paciente SET solicitarBaja = 'no' WHERE DNI = '$DNI'";
    $consulta = $conexion->query($sql);    
}


?>
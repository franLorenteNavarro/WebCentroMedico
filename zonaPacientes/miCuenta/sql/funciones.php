<?php

function recuperarDatos() {
    $conexion = abrirConexion();    
    $usuario= ($_SESSION['usuario']);    
    
    $sql="SELECT nombre, apellidos, fechaNacimiento, email, telefono, direccion FROM paciente WHERE DNI = '$usuario'";
    $consulta = $conexion->query($sql);
    while($row = $consulta->fetch()){                    
        $_SESSION["datosUsuario"] = [$row["nombre"],$row["apellidos"],date("d-m-Y", strtotime($row["fechaNacimiento"])),$row["email"],(int)$row["telefono"],$row["direccion"]];
    }    
}

function actualizarDatos() {
    $conexion = abrirConexion();    
    $usuario= ($_SESSION['usuario']);
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $fechaNacimiento= date("Y-m-d", strtotime($_POST["fechaNacimiento"]));
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];
    
    $sql="UPDATE paciente SET nombre = '$nombre', apellidos = '$apellidos', fechaNacimiento = '$fechaNacimiento', email = '$email', telefono = '$telefono', direccion = '$direccion' WHERE DNI = '$usuario'";
    $consulta = $conexion->query($sql);  
}

function solicitarBaja() {
    $conexion = abrirConexion();    
    $usuario= ($_SESSION['usuario']);    

    $sql="UPDATE paciente SET solicitarBaja='si' WHERE DNI = '$usuario'";
    $consulta = $conexion->query($sql);
}

?>
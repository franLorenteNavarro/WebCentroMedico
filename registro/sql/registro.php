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
    
function registrarPaciente() {
    $conexion = abrirConexion();  
    $DNI= strtoupper($_POST["DNI"]);
    $contraseña= md5($_POST["contraseña"]);
    $nombre= $_POST["nombre"];
    $apellidos= $_POST["apellidos"];
    $email= strtolower($_POST["email"]);
    $telefono= $_POST["telefono"];
    $direccion= $_POST["direccion"];
    $fechaNacimiento= date("Y-m-d", strtotime($_POST["fechaNacimiento"]));

    $sql ="INSERT INTO paciente(DNI, contraseña, cambiarContraseña, solicitarBaja, nombre, apellidos, fechaNacimiento, email, telefono, direccion) VALUES ('$DNI', '$contraseña', 'no', 'no', '$nombre', '$apellidos', '$fechaNacimiento', '$email', $telefono, '$direccion')";
    $consulta = $conexion->query($sql);
}

?>
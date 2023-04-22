<?php

//Funcion que nos permite volver a mostrar los campos rellenos tras un error en el formulario por parte del usuario
function mostrarCampos($campo) {
    if (isset($_POST[$campo])) {
        echo 'value="' . $_POST[$campo] . '"';
    }
}

function mostrarErrores($errores) {
    // print_r($errores);
}

//Funcion para comprobar el rol del usuario y redirigirlo a la zona correspondiente
function comprobarRol() {
    $conexion = abrirConexion();  
    $usuario = ($_SESSION["usuario"]);
    $rol = "";

    $sql1="SELECT * FROM paciente WHERE DNI = '$usuario'";
    $consulta1 = $conexion->query($sql1);
    $contador1 = $consulta1->rowCount();
    
    $sql2="SELECT * FROM medico WHERE DNI = '$usuario'";
    $consulta2 = $conexion->query($sql2);
    $contador2 = $consulta2->rowCount();

    if ($usuario=="admin") {
        $rol = "admin";
        return $rol;
    } else if ($contador1>0) {
        $rol = "paciente";
        return $rol;
    } else if ($contador2>0) {
        $rol = "medico";
        return $rol;
    }
}

//Funcion para comprobar la validez del nombre introducido
function comprobarNombre() {
    $nombre = $_POST["nombre"];
    $patron = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/";

    if (preg_match($patron, $nombre)) {
        if (strlen($nombre)>=3 && strlen($nombre)<=50) {
            return false;
        } else {
            return true;
        }
    } else {
        return true;
    }
}

//Funcion para comprobar la validez de los apellidos introducidos
function comprobarApellidos() {
    $apellidos = $_POST["apellidos"];
    $patron = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/";

    if (preg_match($patron, $apellidos)) {
        if (strlen($apellidos)>=3 && strlen($apellidos)<=100) {
            return false;
        } else {
            return true;
        }
    } else {
        return true;
    }
}

//Funcion para comprobar la validez de la especialidad introducida
function comprobarEspecialidad() {
    $especialidad = $_POST["especialidad"];
    $patron = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/";

    if (preg_match($patron, $especialidad)) {
        if (strlen($especialidad)>=3 && strlen($especialidad)<=100) {
            return false;
        } else {
            return true;
        }
    } else {
        return true;
    }
}

//Funcion para comprobar la validez de la fecha de nacimiento introducida
function comprobarFechaNacimiento() {
    $fechaNacimiento=$_POST["fechaNacimiento"];
    $patron = '/^([0-2][0-9]|3[0-1])(-)(0[1-9]|1[0-2])\2(\d{4})$/';

    if (preg_match($patron, $fechaNacimiento)) {
        return false;
    } else {
        return true;
    }
}

//Funcion para comprobar la validez del email introducido
function comprobarEmail() {
    $email = $_POST["email"];
    
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    } else {
        return true;
    }
}

//Funcion para comprobar la validez del telefono introducido
function comprobarTelefono() {
    $telefono = $_POST["telefono"];
    $patron = '/^(6|7)[ -]*([0-9][ -]*){8}$/';

    if (preg_match($patron, $telefono)) {
        return false;
    } else {
        return true;
    }
}

//Funcion para comprobar la validez del DNI introducido
function comprobarLetraDNI() {

    $DNI = $_POST["DNI"];
    $patron = '/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/i';

    if (preg_match($patron, $DNI)) {
        $numerosDNI = substr($DNI, 0, -1);
        $letraDNI = substr($DNI, -1);
        $valor= (int) ($numerosDNI / 23);
        $valor *= 23;
        $valor=(int) $DNI - $valor;
        $letras= "TRWAGMYFPDXBNJZSQVHLCKEO";
        $letra= substr ($letras, $valor, 1);

        if (strtoupper($letraDNI) == $letra) {
            return false;
        } else {
            return true;
        }
    } else {
        return true;
    }
    
}

//Funcion para comprobar la validez de las contraseñas introducidas
function comprobarContraseñas() {
    $contraseña1 = $_POST["contraseña"];
    $contraseña2 = $_POST["confirmarContraseña"];
    
    if ($contraseña1 == $contraseña2) {
        return false;
    } else {
        return true;
    }
}

//Funcion para comprobar la validez de las contraseñas introducidas
function comprobarLongitudContraseña() {
    $contraseña = $_POST["contraseña"];

    if (strlen($contraseña)>=6) {
        return false;
    } else {
        return true;
    }
}

//Funcion para comprobar si la contraseña ha sido restablecida por el sistema y obligar a su renovación por parte del usuario
function comprobarContraseñaGenerica() {
    $conexion = abrirConexion();    
    $usuario= ($_SESSION['usuario']);    
    
    $sql="SELECT * FROM paciente WHERE DNI = '$usuario'";
    $consulta = $conexion->query($sql);
    $array = $consulta->fetch();
    $cambiarContraseña = $array["cambiarContraseña"];

    if ($cambiarContraseña =="si") {
        return true;
    } else {
        return false;
    }
}

//Funcion para comprobar si el usuario ha solicitado la baja al administrador
function comprobarBaja() {
    $conexion = abrirConexion();    
    $usuario= ($_SESSION['usuario']);  
    
    $sql="SELECT * FROM paciente WHERE DNI = '$usuario'";
    $consulta = $conexion->query($sql);
    $array = $consulta->fetch();
    $solicitarBaja = $array["solicitarBaja"];

    if ($solicitarBaja =="si") {
        return true;
    } else {
        return false;
    }
}

//Funcion para comprobar si el usuario ha solicitado ya una cita para el mismo especialista
function comprobarCitas() {
    $conexion = abrirConexion();  
    $usuario = ($_SESSION["usuario"]);
    $medico = ($_SESSION["medicoSeleccionado"]);
    $fecha = date('Y-m-d');

    $sql="SELECT * FROM cita WHERE paciente = '$usuario' AND medico = '$medico' AND fecha >= '$fecha'";
    $consulta = $conexion->query($sql);
    $contador = $consulta->rowCount();

    if ($contador>0) {
        return true;
    } else{        
        return false;
    }
}

//Funcion para cerrar sesión y redirigir al inicio
function cerrarSesion() {
    if (isset($_POST["desconectar"])) {              
        session_destroy();
        header( "Location:../" );
    }
}


?>
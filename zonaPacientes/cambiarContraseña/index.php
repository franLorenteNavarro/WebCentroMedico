<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro Médico</title>
    <link rel="stylesheet" href="../general/css/estilos.css">
    <link rel="stylesheet" href="./menu/estiloMenu.css">
    <link rel="stylesheet" href="../general/css/botones.css">
    <link rel="stylesheet" href="./css/estiloFormulario.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="../general/menu/menuCode.js" defer></script>
</head>
<body>
    <?php
        session_start();
        include '../../general/sql/conexion.php';
        include '../../general/sql/funciones.php';
        include './sql/funciones.php';        
        cerrarSesion();
    ?>

    <header> <?php include '../general/includes/maquetacion/header.php'; ?> </header>
    
    <?php include './menu/menu.php'; ?>

    <main>
        <?php   
        if (!isset($_SESSION["usuario"])) {
            header( "Location:../" );
        } else {                
            $rol = comprobarRol();
            if ($rol=="paciente") {
                
                if ($_POST) {
                    $conexion = abrirConexion();
                    $errores = [];
                    if (isset($_POST["enviar"])) {            
                        if (empty($_POST['contraseña']) || empty($_POST['confirmarContraseña'])) {
                            $errores[] = 'El campo contraseña no puede estar vacío';
                            ?> <script src="./javascript/alertas/contraseñaVacia.js"></script> <?php
                        }                    
                        else if (!empty($_POST['contraseña']) && !empty($_POST['confirmarContraseña'])) {
                            if (comprobarContraseñas()) {
                                $errores[] = 'Las contraseñas no coinciden';
                                ?> <script src="./javascript/alertas/contraseñasDistintas.js"></script> <?php
                            }
                            if (comprobarLongitudContraseña()) {
                                $errores[] = 'La contraseña debe ser superior a 6 dígitos';
                                ?> <script src="./javascript/alertas/contraseñaLongitud.js"></script> <?php
                            }
                        }

                        if ($errores) {
                            include './includes/formularios/formularioContraseña.php';
                            mostrarErrores($errores);
                        } else {                        
                            cambiarContraseña();    
                            include './includes/formularios/formularioContraseña.php';
                            ?> <script src="./javascript/alertas/exito.js"></script> <?php
                            echo"<script> setTimeout(function(){window.location = './';},2000); </script>";
                        } 
                    }
                } else {                        
                    include "./includes/formularios/formularioContraseña.php";
                }

            } else if ($rol=="admin") {
                header("Location:../../zonaAdmin/");
            } else if ($rol=="medico") {
                header("Location:../../zonaMedicos/");
            }                
        }
        ?>
    </main>

    <footer> <?php include '../general/includes/maquetacion/footer.php'; ?> </footer>
</body>
</html>
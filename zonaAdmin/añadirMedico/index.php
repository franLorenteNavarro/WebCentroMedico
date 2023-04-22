<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro Médico</title>
    <link rel="stylesheet" href="../general/css/estilos.css">
    <link rel="stylesheet" href="../general/menu/css/estiloMenu.css">
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
            if ($rol=="admin") {
                                                        
                if ($_POST) {
                    $conexion = abrirConexion();
                    $errores = [];
                    if (isset($_POST["enviar"])) {
                        if (empty($_POST['DNI'])) {
                            $errores[] = 'El campo DNI no puede estar vacío';
                            ?> <script src="./javascript/alertas/dniVacio.js"></script> <?php
                        }
                        else if (comprobarUsuario()) { 
                            $errores[] = '¡Usuario ya registrado!';
                            ?> <script src="./javascript/alertas/dniRegistrado.js"></script> <?php
                        }
                        else if (strlen($_POST['DNI']) != 9) {
                            $errores[] = 'El DNI debe de ser de nueve dígitos';
                            ?> <script src="./javascript/alertas/dniLongitud.js"></script> <?php
                        }
                        else if (comprobarLetraDNI()) {
                            $errores[] = 'El DNI no es válido';
                            ?> <script src="./javascript/alertas/dniInvalido.js"></script> <?php
                        }                                
                        else if (empty($_POST['nombre'])) {
                            $errores[] = 'El campo nombre no puede estar vacío';
                            ?> <script src="./javascript/alertas/nombreVacio.js"></script> <?php                   
                        }
                        else if (comprobarNombre()) {
                            $errores[] = 'El nombre no es válido';
                            ?> <script src="./javascript/alertas/nombreInvalido.js"></script> <?php
                        }
                        else if (empty($_POST['apellidos'])) {
                            $errores[] = 'El campo apellidos no puede estar vacío';
                            ?> <script src="./javascript/alertas/apellidosVacio.js"></script> <?php
                        }
                        else if (comprobarApellidos()) {
                            $errores[] = 'El campo apellidos no es válido';
                            ?> <script src="./javascript/alertas/apellidosInvalido.js"></script> <?php
                        }
                        else if (empty($_POST['especialidad'])) {
                            $errores[] = 'El campo especialidad no puede estar vacío';
                            ?> <script src="./javascript/alertas/especialidadVacio.js"></script> <?php
                        }
                        else if (comprobarEspecialidad()) {
                            $errores[] = 'El campo especialidad no es válido';
                            ?> <script src="./javascript/alertas/especialidadInvalido.js"></script> <?php
                        }
                        if ($errores) {
                            include './includes/formularios/formularioPerfil.php';
                            mostrarErrores($errores);
                        } else {                        
                            ingresarDatos();     
                            include './includes/formularios/formularioPerfil.php';                                                   
                            ?> <script src="./javascript/alertas/exito.js"></script> <?php
                        } 
                    }
                } else {
                    include "./includes/formularios/formularioPerfil.php";
                }

            } else if ($rol=="paciente") {
                header("Location:../zonaPacientes");
            } else if ($rol=="medico") {
                header("Location:../zonaMedicos");
            }                
        }
        ?>
    </main>
    
    <footer> <?php include '../general/includes/maquetacion/footer.php'; ?> </footer>
</body>
</html>
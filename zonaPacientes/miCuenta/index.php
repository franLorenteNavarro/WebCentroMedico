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
    <script src="./javascript/code.js"></script>
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
            if (comprobarContraseñaGenerica()) {
                header("Location:../cambiarContraseña");
            }
            $rol = comprobarRol();
            if ($rol=="paciente") {

                if (isset($_POST['solicitarBaja'])) {
                    solicitarBaja();
                    echo"<script> window.location = './'; </script>";
                }
                                                        
                if ($_POST) {
                    $conexion = abrirConexion();
                    $errores = [];
                    if (isset($_POST["editar"])) {            
                        if (empty($_POST['nombre'])) {
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
                        else if (empty($_POST['fechaNacimiento'])) {
                            $errores[] = 'El campo fecha de nacimiento no puede estar vacío';
                            ?> <script src="./javascript/alertas/fechaNacimientoVacia.js"></script> <?php
                        }
                        else if (comprobarFechaNacimiento()) {
                            $errores[] = 'El campo fecha de nacimiento no es válido';
                            ?> <script src="./javascript/alertas/fechaNacimientoInvalida.js"></script> <?php
                        }
                        else if (empty($_POST['email'])) {
                            $errores[] = 'El campo email no puede estar vacío';
                            ?> <script src="./javascript/alertas/emailVacio.js"></script> <?php
                        }
                        else if (comprobarEmail()) {
                            $errores[] = 'El campo email no es válido';
                            ?> <script src="./javascript/alertas/emailInvalido.js"></script> <?php
                        }
                        else if (empty($_POST['telefono'])) {
                            $errores[] = 'El campo telefono no puede estar vacío';
                            ?> <script src="./javascript/alertas/telefonoVacio.js"></script> <?php
                        }
                        else if (comprobarTelefono()) {
                            $errores[] = 'El campo telefono no es válido';
                            ?> <script src="./javascript/alertas/telefonoInvalido.js"></script> <?php
                        }
                        else if (empty($_POST['direccion'])) {
                            $errores[] = 'El campo direccion no puede estar vacío';
                            ?> <script src="./javascript/alertas/direccionVacia.js"></script> <?php
                        }     

                        if ($errores) {
                            include './includes/formularios/formularioPerfil.php';
                            mostrarErrores($errores);
                        } else {                        
                            actualizarDatos();     
                            include './includes/formularios/formularioPerfil.php';                                                   
                            ?> <script src="./javascript/alertas/exito.js"></script> <?php
                        } 
                    }
                } else {
                    recuperarDatos();
                    include "./includes/formularios/formularioPerfil.php";
                }

            } else if ($rol=="admin") {
                header("Location:../zonaAdmin/");
            } else if ($rol=="medico") {
                header("Location:../zonaMedicos/");
            }                
        }
        ?>
    </main>
    
    <footer> <?php include '../general/includes/maquetacion/footer.php'; ?> </footer>
</body>
</html>
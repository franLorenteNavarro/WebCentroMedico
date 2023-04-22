<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro Médico</title>
    <link rel="stylesheet" href="../general/css/estilos.css">
    <link rel="stylesheet" href="../general/menu/css/estiloMenu.css">
    <link rel="stylesheet" href="../general/css/botones.css">
    <link rel="stylesheet" href="./css/estiloCalendario.css">
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
        if (!isset($_SESSION["usuario"]) || !isset($_SESSION["medicoSeleccionado"])) {
            header( "Location:../listaEspecialistas" );
        } else {
            if (comprobarContraseñaGenerica()) {
                header("Location:../cambiarContraseña");
            }
            $rol = comprobarRol();
            if ($rol=="paciente") {
                $conexion = abrirConexion();
                if (comprobarCitas()) {
                    header("Location:../listaEspecialistas");
                } else {
                    include './includes/calendario.php';
                    include './javascript/code.php';
                    if (isset($_POST['pedirCita'])) {
                        if (comprobarCita()) {
                            echo"<script src='./javascript/alertas/citaError.js'></script>";
                        } else {
                            pedirCita();
                            echo"<script> window.location.replace('../citasPendientes'); </script>";
                        }
                    }
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
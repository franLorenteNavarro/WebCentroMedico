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
            header( "Location:../../" );
        } else {
            $rol = comprobarRol();
            if ($rol=="admin") {
                listarBajas();
                if (isset($_POST['darBaja'])) {
                    eliminarUsuario();
                    echo"<script> window.location = './'; </script>";
                }
                if (isset($_POST['denegarBaja'])) {
                    denegarBaja();
                    echo"<script> window.location = './'; </script>";
                }
            } else if ($rol=="paciente") {
                header("Location:../../zonaUsuarios/");
            } else if ($rol=="medico") {
                header("Location:../../zonaMedicos/");
            }                
        }
        ?>
    </main>
    
    <footer> <?php include '../general/includes/maquetacion/footer.php'; ?> </footer>
</body>
</html>
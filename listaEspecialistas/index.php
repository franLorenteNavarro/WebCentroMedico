<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro Médico</title>
    <link rel="stylesheet" href="../general/css/estilos.css">
    <link rel="stylesheet" href="../general/css/botones.css">
    <link rel="stylesheet" href="./css/estilosBuscador.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="./javascript/code.js" defer></script>
</head>
<body>
    <?php
        session_start();
        include '../general/sql/conexion.php';
        include '../general/sql/funciones.php';
    ?>
    
    <header> <?php include '../general/includes/maquetacion/header.php'; ?> </header>

    <main>    
        <?php
        if (isset($_SESSION["usuario"])) {
            $rol = comprobarRol();

            if ($rol=="admin") {
                header("Location:../zonaAdmin");
            } else if ($rol=="paciente") {
                header("Location:../zonaPacientes");
            } else if ($rol=="medico") {
                header("Location:../zonaMedicos");
            }
        }
        else {
            include './includes/formularios/buscador.php';
        }            
        ?>
    </main>

    <footer> <?php include '../general/includes/maquetacion/footer.php'; ?> </footer>
</body>
</html>
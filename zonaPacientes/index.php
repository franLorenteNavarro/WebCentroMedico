<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro Médico</title>
    <link rel="stylesheet" href="./general/css/estilos.css">
    <link rel="stylesheet" href="./general/css/botones.css">
    <link rel="stylesheet" href="./general/menu/css/estiloMenu.css">
    <link rel="stylesheet" href="./inicio/css/estiloFormulario.css">
    <script src="./general/menu/menuCode.js" defer></script>
</head>
<body>
    <?php
        //Abrimos sesión e incluimos la conexión y funciones generales
        session_start();
        include '../general/sql/conexion.php';
        include '../general/sql/funciones.php';
        cerrarSesion();
    ?>

    <header> <?php include './inicio/includes/maquetacion/header.php'; ?> </header>

    <?php include './inicio/menu/menu.php'; ?>

    <main>
        <?php
        if (!isset($_SESSION["usuario"])) {
            header( "Location:../" );
        } else {
            //Aquí comprobamos si la contraseña ha sido restablecida por correo, y redirigimos al usuario para que la cambie por seguridad
            if (comprobarContraseñaGenerica()) {
                header("Location:./cambiarContraseña");
            }
            //Aquí comprobamos el rol y la sesión del usuario, para redirigirlo a su zona correspondiente
            $rol = comprobarRol();
            if ($rol=="paciente") {
                include './inicio/includes/formularios/formulario.php';
            } else if ($rol=="admin") {
                header("Location:../zonaAdmin");
            } else if ($rol=="medico") {
                header("Location:../zonaMedicos");
            }
        }
        ?>
    </main>

    <footer> <?php include './inicio/includes/maquetacion/footer.php'; ?> </footer>
</body>
</html>
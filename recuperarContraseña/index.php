<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro Médico</title>
    <link rel="stylesheet" href="../general/css/estilos.css">
    <link rel="stylesheet" href="../general/css/botones.css">
    <link rel="stylesheet" href="./css/estiloFormulario.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<body>  
    <?php
        //Abrimos sesión e incluimos la conexión y funciones generales
        session_start();
        include '../general/sql/conexion.php';
        include '../general/sql/funciones.php';
        include './sql/recuperar.php';
    ?> 

    <header> <?php include '../general/includes/maquetacion/header.php'; ?> </header>

    <main>
        <?php   
        //Aquí abrimos la conexión, comprobamos los campos del formulario, sus posibles errores y mostramos las alertas correspondientes
        $conexion = abrirConexion();
        if ($_POST) {
            if (isset($_POST["recuperar"])) {
                if (cambiarContraseña()) {
                    include './includes/formularios/recuperar.php';
                } else {
                    include './includes/formularios/recuperar.php';
                    ?> <script src="./javascript/recuperarError.js"></script> <?php
                }
            }                
        } else {   
            //Abrimos comprobamos el rol y la sesión del usuario, para redirigirlo a su zona correspondiente                  
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
                include './includes/formularios/recuperar.php';                    
            }
        }
        ?>
    </main>
    
    <footer> <?php include '../general/includes/maquetacion/footer.php'; ?> </footer>
</body>
</html>
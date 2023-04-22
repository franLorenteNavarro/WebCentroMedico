<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro Médico</title>
    <link rel="stylesheet" href="./inicio/css/botones.css">
    <link rel="stylesheet" href="./general/css/estilos.css">
</head>
<body>
    <?php
    //Abrimos sesión e incluimos la conexión y funciones generales
        session_start();
        include './general/sql/conexion.php';
        include './general/sql/funciones.php';
        ?>

    <header> <?php include './inicio/includes/maquetacion/header.php'; ?> </header>

    <main>
        <?php     
        //Abrimos la conexión, comprobamos el rol y la sesión del usuario, para redirigirlo a su zona correspondiente
        $conexion = abrirConexion();                        
        if (isset($_SESSION["usuario"])) {
            $rol = comprobarRol();

            if ($rol=="admin") {
                header("Location:./zonaAdmin");
            } else if ($rol=="paciente") {
                header("Location:./zonaPacientes");
            } else if ($rol=="medico") {
                header("Location:./zonaMedicos");
            }
        }
        else {
            //Aquí se incluyen los botones/enlaces del menú de inicio 
            ?>  
                <div class="contenedor">
                    <div class="boton">
                        <a href="./login" draggable="false">
                            Iniciar Sesión
                        </a>
                        <div class="mascara">
                            <a href="./login" draggable="false"></a>
                        </div>
                    </div>
                    <div class="boton">
                        <a href="./registro" draggable="false">
                            Crear nueva cuenta
                        </a>
                        <div class="mascara">
                            <a href="./registro" draggable="false"></a>
                        </div>
                    </div>
                    <div class="boton">
                        <a href="./listaEspecialistas" draggable="false">
                            Lista de especialistas
                            <span class="decoracion">&raquo;</span>
                        </a>
                        <div class="mascara">
                            <a href="./listaEspecialistas" draggable="false"></a>
                        </div>
                    </div>
                </div>
            <?php
        }            
        ?>
    </main>
    
    <footer> <?php include './inicio/includes/maquetacion/footer.php'; ?> </footer>
</body>
</html>

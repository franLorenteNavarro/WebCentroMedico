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
    <script src="./javascript/code.js" defer></script>
</head>
<body>
    <?php
        //Abrimos sesión e incluimos la conexión y funciones generales
        session_start();
        include '../general/sql/conexion.php';
        include '../general/sql/funciones.php';
        include './sql/registro.php';
    ?>

    <header> <?php include '../general/includes/maquetacion/header.php'; ?> </header>

    <main>
        <?php   
        if ($_POST) {                
            $conexion = abrirConexion();
            $errores = [];
            //Aquí abrimos la conexión, comprobamos los campos del formulario, sus posibles errores y mostramos las alertas correspondientes
            if (isset($_POST["registrar"])) {            
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
                else if (empty($_POST['DNI'])) {
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
                else if (empty($_POST['contraseña']) || empty($_POST['confirmarContraseña'])) {
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
                    include './includes/formularios/registro.php';
                    mostrarErrores($errores);
                } else {                        
                    registrarPaciente();         
                    $_SESSION["usuario"] = strtoupper($_POST["DNI"]);                       
                    header("Location:../zonaPacientes");
                } 
            }                
        } else {  
            //Aquí comprobamos el rol y la sesión del usuario, para redirigirlo a su zona correspondiente
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
                include './includes/formularios/registro.php';                    
            }
        }
        ?>
    </main>
    
    <footer> <?php include '../general/includes/maquetacion/footer.php'; ?> </footer>
</body>
</html>
<?php

    try{
        $conexion = new PDO("mysql:host=localhost;dbname=centromedico", "root", "");
    
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        die("ERROR: No se puede conectar. " . $e->getMessage());
    }

    try{
        if(isset($_REQUEST["palabra"])){
    
            $sql = "SELECT DNI, nombre, apellidos, especialidad FROM medico WHERE nombre LIKE :palabra  OR apellidos LIKE :palabra OR especialidad LIKE :palabra";
            $consulta = $conexion->prepare($sql);
            $palabra = '%' . $_REQUEST["palabra"] . '%';
            $consulta->bindParam(":palabra", $palabra);
            $consulta->execute();
            if($consulta->rowCount() > 0){
                while($row = $consulta->fetch()){
                    $DNI = $row['DNI'];                  
                        $nombre = $row['nombre'];                  
                        $apellidos = $row['apellidos'];
                        $especialidad = $row['especialidad'];

                        echo "<div class='medico'>";
                        echo "<div class='contenedorImagenMedico'><img src='./includes/iconos/prueba.jpg' alt='$apellidos'/></div>";
                        echo "<div class='infoMedico'>";
                        echo "<label>$nombre</label>";          
                        echo "<label>$apellidos</label>";                   
                        echo"<hr/>";
                        echo "<label>$especialidad</label></div>";
                        ?>
                            <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
                                <input type="hidden" name="medicoSeleccionado" value="<?php echo"$DNI" ?>">
                                <input class="estilo-boton boton-principal" type="submit" name="pedirCita" value="Pedir cita">
                            </form>
                        <?php
                        echo "</div>";
                }
            }
        }
    } catch(PDOException $e){
        die("ERROR: No se puede ejecutar la consulta $sql. " . $e->getMessage());
    }

?>
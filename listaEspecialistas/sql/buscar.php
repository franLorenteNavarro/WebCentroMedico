<?php

    try{
        $conexion = new PDO("mysql:host=localhost;dbname=centromedico", "root", "");
    
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        die("ERROR: No se puede conectar. " . $e->getMessage());
    }

    try{
        if(isset($_REQUEST["palabra"])){
    
            $sql = "SELECT nombre, apellidos, especialidad FROM medico WHERE nombre LIKE :palabra  OR apellidos LIKE :palabra OR especialidad LIKE :palabra";
            $consulta = $conexion->prepare($sql);
            $palabra = '%' . $_REQUEST["palabra"] . '%';
            $consulta->bindParam(":palabra", $palabra);
            $consulta->execute();
            if($consulta->rowCount() > 0){
                while($row = $consulta->fetch()){
                    $apellidos = $row['apellidos'];
                    echo "<div class='medico'>";
                        echo "<div><img src='./includes/iconos/prueba.jpg' alt='$apellidos'/></div>";
                        echo "<div class='infoMedico'>";
                        echo "<label>".$row["nombre"]."</label>";          
                        echo"<label>".$row["apellidos"]."</label>";    
                        echo"<hr/>";               
                        echo "<label>".$row["especialidad"]."</label></div>";    
                    echo "</div>";
                }
                //no se encontro nada
            }
        }
    } catch(PDOException $e){
        die("ERROR: No se puede ejecutar la consulta $sql. " . $e->getMessage());
    }

?>
<?php
try{
        $conexion = new PDO("mysql:host=localhost;dbname=centromedico", "root", "");
    
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        die("ERROR: No se puede conectar. " . $e->getMessage());
    }
    ?>
    <div class="contenedorInicio">
        <a href="../" class="enlace" draggable="false">&laquo; Inicio</a>  
    </div>
    <div class="contenedorBuscador">

        <input type="text" id="buscador" autocomplete="off" placeholder="Buscar especialista..." />
        <div class="resultado" id="contenedorBusqueda"></div>
    
        <div id="listaPrincipal">            
            <?php $sql = "SELECT nombre, apellidos, especialidad FROM medico";
                $consulta = $conexion->prepare($sql);
                $consulta->execute();
                if($consulta->rowCount() > 0){
                    while($row = $consulta->fetch()){
                        $apellidos = $row['apellidos'];                  
                        echo "<div class='medico'>";
                            echo "<div><img src='./includes/iconos/prueba.jpg' alt='$apellidos'/></div>";
                            echo "<div class='infoMedico'><label>";                   
                            echo "<label>".$row["nombre"]."</label>";          
                            echo"<label>".$row["apellidos"]."</label>";    
                            echo"<hr/>";          
                            echo "<label>".$row["especialidad"]."</label></div>";    
                        echo "</div>";
                    }
                }
            ?>
        </div>
    </div>
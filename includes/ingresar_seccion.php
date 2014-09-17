<?php include("config.inc");?>
<?php
    if(isset($_POST))
    {
        $nombre_seccion=$_POST['nombre_seccion'];
        $bole = false;        
        if($nombre_seccion=="")
        {
            echo "ERROR: Llene los campos obligatorios!";
        }
        else
        {
            if (is_numeric($nombre_seccion)) {
                echo "ERROR: El nombre de la sección no puede ser un número!";
            }else{
                if (strlen($nombre_seccion) >1 && !($nombre_seccion!="ñ" || $nombre_seccion!="Ñ"))
                {                    
                    echo "ERROR: La longitud del nombre de la sección excede el límite permitido!";
                }
                else 
                {
                    $consulta = "select nombre from seccion";
                    $res = mysqli_query($conexion,$consulta);
                    while ($fila = mysqli_fetch_array($res)) {
                        if ($fila[0] == $nombre_seccion) {
                            $bole = true;
                        }
                    }
                    if ($bole == false) {
                    ///
                        $peticion= "insert into seccion (nombre) values('".$nombre_seccion."')";
                        $resultado=mysqli_query($conexion,$peticion);
                        if($resultado)
                        {
                            echo "ADVERTENCIA: La sección se ha guardado correctamente!";
                        }else{
                            echo "Error: Error al intentar guardar la sección!";
                        } 
                    }else{
                        echo "ERROR: Ya existe la seccion!";
                    }
                }  
            }
         
        } 
    } 
?>
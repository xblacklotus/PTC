<?php include("config.inc");?>
<?php
    if(isset($_POST))
    {
        $nombre_seccion=$_POST['nombre_seccion'];        
        if($nombre_seccion=="")
        {
            echo "ERROR: Llene los campos obligatorios!";
        }
        else
        {
            if (is_numeric($nombre_seccion)) {
                echo "ERROR: El nombre de la sección no puede ser un número!";
            }else{
                if (strlen($nombre_seccion) >1) {
                    echo "ERROR: La longitud del nombre de la sección excede el límite permitido!";
                }else {
                $peticion= "insert into seccion (nombre) values('".$nombre_seccion."')";
                $resultado=mysqli_query($conexion,$peticion);
                if($resultado)
                {
                    echo "ADVERTENCIA: La sección se ha guardado correctamente!";
                    
                }else
                {
                    echo "Error: Error al intentar guardar la sección!";
                } 
                }
            }  
        }
         
    }  
?>
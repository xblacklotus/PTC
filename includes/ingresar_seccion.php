<?php include("config.inc");?>
<?php
    if(isset($_POST))
    {
        //Validar aqui

        $nombre_seccion=$_POST['nombre_seccion'];        
        if($nombre_seccion=="")
        {
            echo "No se puede guardar datos vacios";
        }
        else
        {
            $peticion= "insert into seccion (nombre) values('".$nombre_seccion."')";
            $resultado=mysqli_query($conexion,$peticion);
            if($resultado)
            {
                echo "1";
            }
            else
            {
                echo "2";
            }       
        }
         
    }  
?>
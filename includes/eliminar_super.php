<?php include("config.inc");?>
<?php
    if(isset($_POST))
    {

        $se_id=$_POST['nombre2'];        
        if($se_id=="")
        {
            echo "No hay usuario existente";
        }
        else
        {
            $peticion= "delete from super_usuario where usuario =('".$se_id."')";
            $resultado=mysqli_query($conexion,$peticion);
            if($resultado)
            {
                echo "eliminada";
            }
            else
            {
                echo "error";
            }       
        }
         
    }  
?>
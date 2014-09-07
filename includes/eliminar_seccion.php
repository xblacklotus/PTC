<?php include("config.inc");?>
<?php
    if(isset($_POST))
    {

        $se_id=$_POST['se_id'];        
        if($se_id=="")
        {
            echo "No hay seccion ingresada";
        }
        else
        {
            $peticion= "delete from seccion where id =('".$se_id."')";
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
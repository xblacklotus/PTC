<?php include("config.inc");?>
<?php
    if(isset($_POST))
    {

        $se_id=$_POST['id_usuario'];        
        if($se_id=="")
        {
            echo "No hay usuario existente";
        }
        else
        {
            $peticion= "delete from usuario where id =('".$se_id."')";
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
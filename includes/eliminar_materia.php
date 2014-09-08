<?php include("config.inc");?>
<?php
    if(isset($_POST))
    {

        $id=$_POST['ma_id'];        
        if($id=="")
        {
            echo "No hay seccion ingresada";
        }
        else
        {
            $peticion= "delete from materias where id =('".$id."')";
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
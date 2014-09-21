<?php include("config.inc");?>
<?php
    if(isset($_POST))
    {

        $id=$_POST['id_ma'];   
        if($id=="")
        {
            echo "No hay maestro ingresado";
        }
        else
        {
            $peticion= "delete from profesor where id =('".$id."')";
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
<?php include("config.inc");?>
<?php
    if(isset($_POST))
    {

        $se_id=$_POST['se_id'];        
        if($se_id=="")
        {
            echo "ERROR: Llene los campos obligatorios!";
        }
        else
        {
            if (is_numeric($se_id)) {
                $peticion= "delete from seccion where id =('".$se_id."')";
                $resultado=mysqli_query($conexion,$peticion);
                if($resultado)
                {
                    echo "ADVERTENCIA: La sección se ha eliminado correctamente!";
                }
                else
                {
                    echo "Error: Error al intentar eliminar la sección!";
                }  
            }else{
                echo "ERROR: Conflicto al eliminar el ID de la sección!";
            }      
        }
         
    }  
?>
<?php include("config.inc");?>
<?php
    if(isset($_POST))
    {

        $id=$_POST['id_per'];         
        if($id=="")
        {
            echo "ERROR: conflicto al intentar eliminar el prefil";
        }
        else
        {
            if (is_numeric($id))
            {
                    $peticion= "delete from perfiles where id =('".$id."')";
                $resultado=mysqli_query($conexion,$peticion);
                if($resultado)
                {
                    echo "ADVERTENCIA: El perfil se ha eliminado correctamente!";
                }
                else
                {
                    echo "Error: Error al intentar eliminar el perfil!";
                }      
            }
            else{
                echo "El id no es numerico";
            }
             
        }
         
    }  
?>
<?php include("config.inc");?>
<?php
    if(isset($_POST))
    {

        $id=$_POST['ma_id'];        
        if($id=="")
        {
            echo "ERROR: conflicto al intentar eliminar la materia!";
        }
        else
        {
            $peticion= "delete from materias where id =('".$id."')";
            $resultado=mysqli_query($conexion,$peticion);
            if($resultado)
            {
                echo "ADVERTENCIA: La materia se ha eliminado correctamente!";
            }
            else
            {
                echo "Error: Error al intentar eliminar la materia!";
            }       
        }
         
    }  
?>
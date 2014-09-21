<?php include("../includes/config.inc");
//Bloque de grado
	$el_id=$_POST['id'];
    $peticion="delete from archivos where id=".$el_id."" ;
    $resultado=mysqli_query($conexion,$peticion);
    if($resultado)
    {
        echo "Archivo eliminado correctamente";
    }
    else
    {
        echo "Hubo un error a la hora de eliminar";
    }
?> 

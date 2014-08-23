<?php include("../includes/config.inc");
//Bloque de grado
	$el_id=$_POST['strTexto'];
    $peticion="delete from perfiles where id=".$el_id."" ;
    $resultado=mysqli_query($conexion,$peticion);
    if($resultado)
    {
        echo "Perfil eliminado correctamente";
    }
    else
    {
        echo "Hubo un error a la hora de eliminar";
    }

?> 

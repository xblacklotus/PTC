
<?php include("../includes/inheader.inc");
//Bloque de grado
	$el_id=$_POST['strTexto'];
    $peticion="delete from perfiles where id=".$el_id."" ;
    $resultado=mysqli_query($conexion,$peticion);
    echo "1";

?> 

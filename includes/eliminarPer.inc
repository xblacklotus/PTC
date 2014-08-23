<?php require_once('elegir_perfil.inc'); ?>
<?php include("../includes/inheader.inc");
//Bloque de grado
	$p_id=$_POST['srtTexto'];
    $peticion="delete from perfiles where id=".$p_id."" ;
    $resultado=mysqli_query($conexion,$peticion);
    echo "1";

?> 

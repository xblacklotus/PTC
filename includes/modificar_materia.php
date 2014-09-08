<?php include("config.inc");?>
<?php
	if (isset($_POST)) {

		$materia = $_POST['new_ma'];
		$grado = $_POST['new_gra'];
		$seccion = $_POST['new_se'];
		$id = $_POST['ma_id'];
		?>
		<?php 
		if ($materia == "" || $grado == "" || $seccion== "") {
			echo "No se pueden ingresar valores nulos";
		}else{
				$peticion= "update materia 
				set nombre ='".$materia."',grado='".$grado."',id_seccion='".$seccion."' 
				where id =".$id;
            		$resultado=mysqli_query($conexion,$peticion);
           			if($resultado)
            		{
                		echo "Exito";
            		}
            		else
            		{
                		echo "Error";
            		}
		}
	}
		
?>
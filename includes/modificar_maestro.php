<?php include("config.inc");?>
<?php
	if (isset($_POST)) {

		$se = $_POST['new_se'];
		$id = $_POST['se_id'];
		$bole = false;
		?>
		<?php 
		if ($se == "") {
			echo "No se pueden ingresar valores nulos";
		}else{
			$consulta = "select nombre from seccion";
			$res = mysqli_query($conexion,$consulta);
			while ($fila = mysqli_fetch_array($res)) {
				if ($fila == $se) {
					$bole = true;
				}
			}
			if ($bole == false) {
				$peticion= "update seccion set nombre ='".$se."' where id =".$id;
            		$resultado=mysqli_query($conexion,$peticion);
           			if($resultado)
            		{
                		echo "Exito";
            		}
            		else
            		{
                		echo "Error";
            		}
			}else{
				echo "Ya existe la seccion";
			}
		}
	}
		
?>
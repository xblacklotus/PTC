<?php include("config.inc");?>
<?php
	if (isset($_POST)) {

		$se = $_POST['new_se'];
		$id = $_POST['se_id'];
		$bole = false;
		?>
		<?php 
		if ($se == "") {
			echo "ERROR: Llene los campos obligatorios!";
		}else
		{
			if (is_numeric($se)) {
				echo "ERROR: El nombre de la sección no puede ser un número!";
			}else{
				if (strlen($se) > 1) {
					echo "ERROR: La longitud del nombre de la sección excede el límite permitido!";
				}else{
					$consulta = "select nombre from seccion";
					$res = mysqli_query($conexion,$consulta);
					while ($fila = mysqli_fetch_array($res)) {
						if ($fila[0] == $se) {
							$bole = true;
						}
					}
					if ($bole == false) {
						$peticion= "update seccion set nombre ='".$se."' where id =".$id;
            			$resultado=mysqli_query($conexion,$peticion);
           				if($resultado)
            			{
                			echo "ADVERTENCIA: La sección se ha modificado correctamente!";
            			}
            			else
            			{
                			echo "Error: Error al intentar modificar la sección!";
            			}
					}else{
						echo "ERROR: Ya existe la seccion!";
					}
				}
			}
		}
	}
		
?>
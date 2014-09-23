<?php include("config.inc");?>
<?php
	if (isset($_POST)) {
		
		$contra = $_POST['contra'];
		$id = $_POST['nombre2'];
		$bole = false;
		?>
		<?php 
		if ($contra == "") {
			echo "No se pueden ingresar valores nulos";
		}else{
			$consulta = "select contra from super_usuario";
			$res = mysqli_query($conexion,$consulta);
			while ($fila = mysqli_fetch_array($res)) {
				if ($fila == $contra) {
					$bole = true;
				}
			}
			if ($bole == false) {
				$peticion= "update super_usuario set contra ='".$contra."' where usuario ='".$id."'";
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
				echo "Ya existe ";
			}
		}
	}
		
?>
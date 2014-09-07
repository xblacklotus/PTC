<?php include("config.inc");?>
<?php
	if (isset($_POST)) {

		$contra = $_POST['contra'];
		$id = $_POST['id_usuario'];
		$bole = false;
		?>
		<?php 
		if ($contra == "") {
			echo "No se pueden ingresar valores nulos";
		}else{
			$consulta = "select contraseña from usuario";
			$res = mysqli_query($conexion,$consulta);
			while ($fila = mysqli_fetch_array($res)) {
				if ($fila == $contra) {
					$bole = true;
				}
			}
			if ($bole == false) {
				$peticion= "update usuario set contraseña ='".$contra."' where id =".$id;
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
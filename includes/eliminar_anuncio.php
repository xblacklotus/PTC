<?php include("config.inc"); ?>
<?php
	if (isset($_POST)) {
		$an_id = $_POST['an_id'];
		if ($an_id == "") {
			echo "ERROR : No se puede reconocer el identificador del anuncio!";
		}else{
			if (is_numeric($an_id)) {
				$peticion = "delete from anuncios where id=('".$an_id."')";
				$resultado = mysqli_query($conexion,$peticion);
				if ($resultado) {
					echo "ADVERTENCIA: El anuncio se ha eliminado correctamente!";
				}else{
					echo "ERROR : Error al intentar eliminar el anuncio!";
				}
			}else{
				echo "ERROR : Conflicto al eliminar el ID del anuncio!";
			}
		}
	}
?>
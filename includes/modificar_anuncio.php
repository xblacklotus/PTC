<?php include("config.inc");?>
<?php
	if (isset($_POST)) {
		$anuncio = $_POST['new_anu'];
		$id = $_POST['id'];
		if ($anuncio == "") {
			echo "ERROR : El anuncio no puede estar vacio!";
		}else{
			if ($id == "") {
				echo "ERROR : No se puede encontrar el valor del ID del anuncio!";
			}else{
				if (strlen($anuncio) >250) {
					echo "ERROR : Se excede la longitud máxima de carácteres en el anuncio!";
				}else{
					if (is_numeric($id)) {
						////////////////////
						$sql = "update anuncios
						set anuncio='".$anuncio."'
						where id=".$id;
						$res = mysqli_query($conexion,$sql);
						if ($res) {
							echo "ADVERTENCIA: El anuncio se ha modificado correctamente!";
						}else{
							echo "ERROR : Error al intentar modificar el anuncio!";
						}
						////////////////////
					}else{
						echo "ERROR : No se puede reconocer el ID del anuncio!";
					}
				}
			}
		}
	}
?>
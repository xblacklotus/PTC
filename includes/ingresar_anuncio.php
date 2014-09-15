<?php include("config.inc"); ?>
<?php
	if (isset($_POST)) {
		$id_profesor = $_POST['profesor'];
		$anuncio = $_POST['anuncio'];
		$materia = $_POST['materia'];
		if ($id_profesor == "") {
			echo "ERROR : No se ha encontrado el identificador del profesor!";
		}else{
			if ($anuncio == "") {
				echo "ERROR : El anuncio no puede estar vacío!";
			}else{
				if ($materia == "") {
					echo "ERROR : No se ha encontrado el identificador de la materia!";
				}else{
					if (strlen($anuncio) >250) {
						echo "ERROR : La longitud del anuncio excede el límite permitido!";
					}else{
						if (is_numeric($id_profesor)) {
							if (is_numeric($materia)) {
								echo "ERROR : No se reconoce el valor del identificador de la materia!";
							}else{
								/////////////////////////
								///determinar el id de la materia
								$pet = "select id from materias where nombre = '".$materia."'";
								$res = mysqli_query($conexion,$pet);
								$fila = mysqli_fetch_array($res);
								$id_materia = $fila[0];
								//
								$sql = "insert into anuncios(id_materia,anuncio)
										values ('".$id_materia."','".$anuncio."')";
								$resultado = mysqli_query($conexion,$sql);
										if ($resultado) {
											echo "ADVERTENCIA: El anuncio se ha guardado correctamente!";
										}else{
											echo "ERROR: Error al intentar guardar el anuncio!";
											echo "Id materia :".$id_materia;
											echo "anuncio :".$anuncio;
										}
										////////////////////////
							}
						}else{
							echo "ERROR : No se reconoce el valor del identificador del profesor!";
						}
					}
				}
			}
		}							
	}
?>
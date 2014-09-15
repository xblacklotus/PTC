<?php include("config.inc");?>
<?php
	if (isset($_POST)) {
		$materia = $_POST['new_ma'];
		$grado = $_POST['new_gra'];
		$seccion = $_POST['new_se'];
		$id = $_POST['ma_id'];
		/////////
		$consulta1 = "select * from materias";
		$resp = mysqli_query($conexion,$consulta1);
		while ($rsCon = mysqli_fetch_array($resp)) {
			if ($nombre_materia == $rsCon['nombre']) {
				$con_nombre = $rsCon['nombre'];
				$con_grado = $rsCon['grado'];
				$con_seccion = $rsCon['id_seccion'];
			}
		}
		//validacion
		if ($materia == "") {
			echo "ERROR : Llene el campo obligatorio del nombre de la materia!";
		}else{
			if ($grado == "") {
				echo "ERROR : Llene el campo obligatorio del grado al que pertenece la materia!";
			}else{
				if ($seccion == "") {
					echo "ERROR : Llene el campo obligatorio de la sección del grado al que pertenece la materia!!";
				}else{
					if (strlen($materia) > 20) {
						echo "ERROR: La longitud del nombre de la materia excede el límite permitido!";
					}else{
						if (is_numeric($materia)) {
							echo "ERROR: El nombre de la materia no puede ser un número!";
						}else{
							if (is_numeric($grado)) {
									//////////////////////////////////////////
									//Consulta para determinar el id de la sección
									$pet = "select id from seccion where nombre = '".$seccion."'";
									$res = mysqli_query($conexion,$pet);
									$fila = mysqli_fetch_array($res);
									$id_seccion = $fila[0];
									if ($con_grado == $grado && $con_seccion == $id_seccion) {
										echo "ERROR: La sección que intenta modificar ya existe para este grado y sección!";
									}else{
									//
									$peticion= "update materias 
									set nombre ='".$materia."',grado='".$grado."',id_seccion='".$id_seccion."' 
									where id =".$id;
            						$resultado=mysqli_query($conexion,$peticion);
           							if($resultado){
                						echo "ADVERTENCIA: La materia se ha modificado correctamente!";
            						}else{
                						echo "Error: Error al intentar modificar la materia!";
                						echo "Id seccion :".$id_seccion;
            						}
									/////////////////////////////////////////
            						}
							}else{
								echo "ERROR: El grado no puede tener letras!";
							}
						}
					}
				}
			}
		}

	}
		
?>
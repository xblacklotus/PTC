<?php include("config.inc");?>
<?php
	if (isset($_POST)) {
		$id_profesor = "3";
		$nombre_materia = $_POST['nombre_materia'];
		$grado = $_POST['grados'];
		$seccion = $_POST['secciones'];
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
		//Validaciónn
		if ($nombre_materia == "") {
			echo "ERROR : Llene el campo obligatorio del nombre de la materia!";
		}else{
			if ($grado == "") {
				echo "ERROR : Llene el campo obligatorio del grado al que pertenece la materia!";
			}else{
				if ($seccion == "") {
					echo "ERROR : Llene el campo obligatorio de la sección del grado al que pertenece la materia!!";
				}else{
					if (strlen($nombre_materia) > 20) {
						echo "ERROR: La longitud del nombre de la materia excede el límite permitido!";
					}else{
						if (is_numeric($nombre_materia)) {
							echo "ERROR: El nombre de la materia no puede ser un número!";
						}else{
							if (is_numeric($grado)) {
									//////////////////////////////////////////
									//Consulta para determinar el id de la sección
									$pet = "select id from seccion where nombre = '".$seccion."'";
									$res = mysqli_query($conexion,$pet);
									$fila = mysqli_fetch_array($res);
									$id_seccion = $fila[0];
									//
									if ($con_grado == $grado && $con_seccion == $id_seccion) {
										echo "ERROR: La sección que intenta ingresar ya existe para este grado y sección!";
									}else{
										$sql ="insert into materias(nombre,grado,id_profesor,id_seccion)
										values('".$nombre_materia."','".$grado."','".$id_profesor."','".$id_seccion."')";
										$resultado = mysqli_query($conexion,$sql);
										if ($resultado) {
											echo "ADVERTENCIA: La materia se ha guardado correctamente!";
										}else{
											echo "Error: Error al intentar guardar la materia!";
											//echo "Nombre materia: ".$nombre_materia;
											//echo "Grado :".$grado;
											//echo "Id profesor :".$id_profesor;
											//echo "Id Seccion :".$id_seccion;
										}	
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
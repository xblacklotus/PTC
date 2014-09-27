<?php include("config.inc");?>
<?php
	if (isset($_POST)) {
		$profesor=$_POST['profesor'];
		$materia = $_POST['new_ma'];
		$grado = $_POST['new_gra'];
		$seccion = $_POST['new_se'];
		$id = $_POST['ma_id'];
		/////////
		$consulta1 = "select * from materias";
		$con_nombre;
		$con_grado=null;
		$con_seccion;	
		$resp = mysqli_query($conexion,$consulta1);
		while ($rsCon = mysqli_fetch_array($resp)) {
			if ($materia == $rsCon['nombre']) {
				$con_nombre = $rsCon['nombre'];
				$con_grado = $rsCon['grado'];
				$con_seccion = $rsCon['id_seccion'];
			}
		}


		$consulta6 = "select * from profesor";
		$resp = mysqli_query($conexion,$consulta6);
		$i=0;
		while ($rsCon = mysqli_fetch_array($resp)) 
		{
			if($i==$profesor)
			{				
				$profesor=$rsCon['id'];
				break;
			}
			$i++;
		}
		$grado_ant=1;
		$seccion_ant=0;

		$consulta="select * from materias where id=".$id;
		$respuesta=mysqli_query($conexion,$consulta);		
		if($respuesta)
		{
			if($datos=mysqli_fetch_array($respuesta))
			{
				$grado_ant=$datos['grado'];
				$seccion_ant=$datos['id_seccion'];
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
									if (($con_grado == $grado && $con_seccion == $id_seccion) && ($con_grado!=$grado_ant  && $con_seccion!=$seccion_ant))
									{
										echo "ERROR: La sección que intenta modificar ya existe para este grado y sección!";
										echo $con_grado;
										echo $con_seccion;
										echo $grado_ant;
										echo $seccion_ant;
										echo $id;
									}else{
									//
									$peticion= "update materias 
									set nombre ='".$materia."',id_profesor=".$profesor.",grado='".$grado."',id_seccion='".$id_seccion."' 
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
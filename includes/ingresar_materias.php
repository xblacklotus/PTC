<?php include("config.inc");?>
<?php
	if (isset($_POST)) {
		$id_profesor = "3";
		$nombre_materia = $_POST['nombre_materia'];
		$grado = $_POST['grados'];
		$seccion = $_POST['secciones'];
		if ($nombre_materia == "" || $grado == "" || $seccion == "") {
			echo "No se puede guardar datos vacios";
		}else{
			//Consulta para determinar el id de la sección
			$pet = "select id from seccion where nombre = '".$seccion."'";
			$res = mysqli_query($conexion,$pet);
			$fila = mysqli_fetch_array($res);
			$id_seccion = $fila[0];
			//
			$sql ="insert into materias(nombre,grado,id_profesor,id_seccion)
			values('".$nombre_materia."','".$grado."','".$id_profesor."','".$id_seccion."')";
			$resultado = mysqli_query($conexion,$sql);
			if ($resultado) {
				echo "Exito";
			}else{
				echo "Error";
				echo "Nombre materia: ".$nombre_materia;
				echo "Grado :".$grado;
				echo "Id profesor :".$id_profesor;
				echo "Id Seccion :".$id_seccion;
			}
		}
	}
?>
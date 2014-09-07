<?php include("config.inc"); ?>
<?php
	if (isset($_POST)) {
		$contra = $_POST['contra_usu'];
		$reafirmacion = $_POST['contra_rea'];
		if ($contra == "" || $reafirmacion == "") {
			echo "No podemos guardar valores vacios";
		}else{
			if ($contra == $reafirmacion) {
				$sql = "insert into usuario (contraseña) value (".$contra.")";
				$resp = mysqli_query($conexion,$sql);
				if ($resp) {
					echo "Guardado";
				}else {
					echo "Error";
					echo "Contra :".$contra;
					echo "Reafirmacion :"+$reafirmacion;
				}
			}else{
				echo "Las contraseñas no son iguales.";
			}
		}
	}
?>
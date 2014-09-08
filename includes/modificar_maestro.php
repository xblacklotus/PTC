<?php include("config.inc");?>
<?php
	if (isset($_POST)) {

		$nombre = $_POST['nombre2'];
		$apellido = $_POST['apellido2'];
		$usuario = $_POST['id_usuario2'];
		$id = $_POST['id_ma'];
		$bole = false;
		?>
		<?php 
		if ($nombre == "") {
			echo "No se pueden ingresar valores nulos";
		}
		else if($apellido=="")
		{
			echo "No se pueden ingresar valores nulos";
		}
		else if($usuario=="")
		{
			echo "No se pueden ingresar valores nulos";
		}
		else
		{
			//$consulta = "select nombres,apellidos,id_usuario from profesor";
			//$res = mysqli_query($conexion,$consulta);
			//while ($fila = mysqli_fetch_array($res)) {
				//if ($fila == $se) {
			//		$bole = true;
			//	}
			
			if ($bole == false) {
				$peticion= "update profesor set nombres ='".$nombre."', apellidos='".$apellido."', id_usuario='".$usuario."' where id =".$id;
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
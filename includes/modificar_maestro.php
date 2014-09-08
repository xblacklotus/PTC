<?php include("config.inc");?>
<?php
	if (isset($_POST)) {

		$nombre = $_POST['nombre2'];
		$apellido = $_POST['apellido2'];
		$usuario = $_POST['id_usuario2'];
		 $id= $_POST['id_ma'];
		echo "prueba ".$id;
		?>
		<?php 
		if ($nombre != "") {
			
			$peticion= "update profesor set nombres ='".$nombre."' where id ='".$id."'";
            $resultado=mysqli_query($conexion,$peticion);
           	if($resultado)
            {
                echo "Exito";
            }
            else
            {
               	echo "Error en nombre";
            }

		}
		 if($apellido !="")
		{
			$peticion= "update profesor set apellidos ='".$apellido."' where id ='".$id."'";
            $resultado=mysqli_query($conexion,$peticion);
           	if($resultado)
            {
                echo "Exito";
            }
            else
            {
               	echo "Error en apellido";
            }
		}
		if($usuario !="")
		{
			$peticion= "update profesor set id_usuario2 ='".$usuario."' where id ='".$id."'";
            $resultado=mysqli_query($conexion,$peticion);
           	if($resultado)
            {
                echo "Exito";
            }
            else
            {
               	echo "Error en usuario";
            }
		}
		
	}
		
?>
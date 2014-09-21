<?php include("config.inc");?>
<?php
	if (isset($_POST)) {
		$nombre = $_POST['nombre2'];
		$apellido = $_POST['apellido2'];
		 $id= $_POST['id_ma'];
		?>
		<?php 
		if ($nombre == "" || $apellido == "" ) {
			
			
        echo "No pueden haber espacios en blanco";
		}
    elseif (is_numeric($nombre) || is_numeric($apellido)) {
        
        echo "Hay campos que no tienen que ser numericos";
    }
    else
    {
      $peticion= "update profesor set nombres ='".$nombre."', apellidos='".$apellido."' where id ='".$id."'";
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
		
		
	}
		
?>
<?php include("config.inc");?>
<?php
	if (isset($_POST)) {
    var_dump($_POST);
		$nombre = $_POST['nombre2'];
		$apellido = $_POST['apellido2'];
		$usuario = $_POST['id_usuario2'];
		 $id= $_POST['id_ma'];
		echo "prueba ".$id;
		?>
		<?php 
		if ($nombre == "" || $apellido == "" || $usuario == "" ) {
			
			
        echo "No pueden haber espacios en blanco";
		}
    elseif (is_numeric($nombre) || is_numeric($apellido)) {
        
        echo "Hay campos que no tienen que ser numericos";
    }
    
    elseif(!is_numeric($usuario) )
    {
      echo "El usuario tiene que ser numerico";
    }
    elseif ($usuario<1) 
    {
      echo "Usuario fuera de rango";
    }
    else
    {
      $peticion= "update profesor set nombres ='".$nombre."', apellidos='".$apellido."', id_usuario='".$usuario."' where id ='".$id."'";
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
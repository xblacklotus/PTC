<?php include("config.inc");?>
<?php
	if (isset($_POST)) {
		$not = $_POST['nota'];
         $idd= $_POST['id'];
		?>
		<?php 
		if ($not == ""  ) {
			
			
        echo "No pueden haber espacios en blanco";
		}
    elseif ($not>10 || $not<0) {
        
        echo "Datos no validos";
    }
    else
    {
      $peticion= "update notas_perfiles set nota ='".$not."' where id ='".$idd."'";
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
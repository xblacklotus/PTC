<?php include("config.inc");?>
<?php
	if (isset($_POST)) {

		$nombre=$_POST['nombre'];  
        $apellido=$_POST['apellido'];
        $grado=$_POST['gradd']; 
        $sec=$_POST['secc']; 
        $id=$_POST['id'];

				$peticion= "update alumno set nombres ='".$nombre."',apellidos='".$apellido."',grado='".$grado."',id_seccion='".$sec."'where id=".$id;
            		$resultado=mysqli_query($conexion,$peticion);
           			if($resultado)
            		{
                		echo "Exito";
            		}
            		else
            		{
                        echo $peticion;
                		echo "Error";
            		}
		
	}
		
?>
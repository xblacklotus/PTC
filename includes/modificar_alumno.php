<?php include("config.inc");?>
<?php
	if (isset($_POST)) {

		$nombre=$_POST['nombre'];  
        $apellido=$_POST['apellido'];
        $grado=$_POST['gradd']; 
        $sec=$_POST['secc']; 
        $id=$_POST['id'];
        $id_usuario=$_POST['id_usuario'];


        $pet1="select * from seccion";
        $res1=mysqli_query($conexion,$pet1);
        while ($fil=mysqli_fetch_array($res1))
        {
            if($sec==$fil['nombre'])
            {
                $sec=$fil['id'];
            }
        }



				$peticion= "update alumno set nombres ='".$nombre."',apellidos='".$apellido."',grado='".$grado."',id_seccion='".$sec."', id_usuario=".$id_usuario." where id=".$id;
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
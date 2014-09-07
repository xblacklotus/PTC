<?php include("config.inc");?>
<?php
    if(isset($_POST))
    {
        //Validar aqui

        $nombre_maestro=$_POST['nombre_maestro'];
        $apellido_maestro=$_POST['apellido_maestro']; 
        $usuario=$_POST["usuario"];       
        if($nombre_maestros=="")
        {
            echo "No se puede guardar datos vacios";
        }
        else
        {
            $peticion= "insert into profesor (nombres,apellidos,id_usuario) values('".$nombre_maestro.",".$apellido_maestro.",".$usuario."')";
            echo $peticion;
            $resultado=mysqli_query($conexion,$peticion);
            if($resultado)
            {
                echo "Guardado";
            }
            else
            {
                echo "Error";
            }       
        }
         
    }  
?>
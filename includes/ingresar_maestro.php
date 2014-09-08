<?php include("config.inc");?>
<?php
    if(isset($_POST))
    {
        //Validar aqui

        $nombre_maestro=$_POST['nombre_maestro'];
        $apellido_maestro=$_POST['apellido_maestro']; 
        $usuario=$_POST["usuario"];
        echo "Nombre ".$nombre_maestro;
            echo "Apellidos ".$apellido_maestro;
            echo "Id :".$usuario;     
        if($nombre_maestro =="")
        {
            echo "No se puede guardar datos vacios";
        }elseif ($apellido_maestro == "") {
            echo "No se puede guardar datos vacios";
        }
        else
        {

            $peticion= "insert into profesor (nombres,apellidos,id_usuario)
            values ('".$nombre_maestro."','".$apellido_maestro."','".$usuario."')";
            $resultado=mysqli_query($conexion,$peticion);
            if($resultado)
            {

                echo "Guardado con exito";

            }
            else
            {
                echo "Error";
            }       
        }
         
    }  
?>
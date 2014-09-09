<?php include("config.inc");?>
<?php
    if(isset($_POST))
    {
        //Validar aqui
        var_dump($_POST);
        $nombre=$_POST['nombre'];  
        $apellido=$_POST['apellido'];
        $grado=$_POST['grad']; 
        $secc=$_POST['sec'];
        $use=$_POST['user']; 
        echo "nombre".$nombre;   
        echo "apellido".$apellido;
        echo "grad".$grado;
        echo "sec".$secc;
        echo "user".$use;
        if($nombre=="")
        {
            echo "No se puede guardar datos vacios";
        }
        else
        {
            $peticion= "insert into alumno (nombres,apellidos,grado,id_seccion,id_usuario) 
            values('".$nombre."','".$apellido."','".$grado."','".$secc."','".$use."')";
            $resultado=mysqli_query($conexion,$peticion);
            if($resultado)
            {
                echo "Guardado con exito";
            }
            else
            {
                echo "Error al guardar";
            }       
        }
         
    }  
?>
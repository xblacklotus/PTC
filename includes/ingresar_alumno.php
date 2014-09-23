<?php include("config.inc");?>
<?php
    if(isset($_POST))
    {
        //Validar aqui

        $nombre=$_POST['nombre'];  
        $apellido=$_POST['apellido'];
        $grado=$_POST['gradd']; 
        $sec=$_POST['secc'];
        $use=$_POST['userr'];
        $p = "select id from seccion where nombre = '".$sec."'";
        $re=mysqli_query($conexion,$p);
        $fila=mysqli_fetch_array($re);
        $id=$fila[0];
        echo "Id".$id;
        if($nombre=="" || $apellido=="" || $use=="")
        {
            echo "No se puede guardar datos vacios";
        }
        else
        {
            $peticion= "insert into alumno (nombres,apellidos,grado,id_seccion,id_usuario) 
            values('".$nombre."','".$apellido."','".$grado."','".$id."','".$use."')";
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
<?php include("config.inc");?>

<?php
    if(isset($_POST))
    {
        //Validar aqui

        $descripcion=$_POST["descripcion"];
        $porcentaje=$_POST["porcentaje"];
        $nombre=$_POST["metermateria"];
        $consulta = "select id from materias where nombre = '".$nombre."'";
                                    $res = mysqli_query($conexion,$consulta);
                                    $fila = mysqli_fetch_array($res);
                                    $id_materia = $fila[0];
                                    
        $trimestre=$_POST["metertri"];
        //echo "Nombre ".$nombre_maestro;
          //  echo "Apellidos ".$apellido_maestro;
           // echo "Id :".$usuario;     
        if($descripcion =="" || $porcentaje =="" || $nombre =="" || $trimestre =="" )
        {
            echo "No se puede guardar datos vacios";
        }elseif (is_numeric($descripcion) || is_numeric($nombre)) {
            echo "Hay datos que no tienen que ser numericos";
        }
        elseif(!is_numeric($porcentaje) || !is_numeric($trimestre)){

            echo "Hay datos que no tienen que ser texto";
        }
        else
        {

            $peticion= "insert into perfiles (descripcion,porcentaje,id_materia,trimestre)
            values ('".$descripcion."','".$porcentaje."','".$id_materia."','".$trimestre."')";
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
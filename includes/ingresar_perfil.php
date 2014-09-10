<?php include("config.inc");?>
<?php
    if(isset($_POST))
    {
        //Validar aqui

        $descripcion=$_POST["descripcion"];
        $porcentaje=$_POST["porcentaje"];
        $materia=$_POST["metermateria"];
        echo "materia".$materia;
        $trimestre=$_POST["metertri"];
        //echo "Nombre ".$nombre_maestro;
          //  echo "Apellidos ".$apellido_maestro;
           // echo "Id :".$usuario;     
        if($descripcion =="" || $porcentaje =="" || $materia =="" || $trimestre =="" )
        {
            echo "No se puede guardar datos vacios";
        }elseif (is_numeric($descripcion) || is_numeric($materia)) {
            echo "Hay datos que no tienen que ser numericos";
        }
        elseif(!is_numeric($porcentaje) || !is_numeric($trimestre)){

            echo "Hay datos que no tienen que ser texto";
        }
        else
        {

            $peticion= "insert into perfiles (descripcion,porcentaje,id_materia,trimestre)
            values ('".$descripcion."','".$porcentaje."','".$materia."','".$trimestre."')";
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
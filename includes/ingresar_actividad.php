<?php include("config.inc");?>
<?php
    if(isset($_POST))
    {
        //Validar aqui

        $fecha=$_POST['fecha'];
        $detalle=$_POST['actividad']; 
        echo "Nombre ".$fecha;
            echo "Apellidos ".$detalle;
             
        if($fecha =="")
        {
            echo "No se puede guardar datos vacios";
        }elseif ($detalle == "") {
            echo "No se puede guardar datos vacios";
        }
        else
        {

            $peticion= "insert into actividades (fecha,detalles)
            values ('".$fecha."','".$detalle."')";
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
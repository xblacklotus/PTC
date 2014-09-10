<?php include("config.inc");?>
<?php
    if(isset($_POST))
    {
        var_dump($_POST);   
        $descripcion=$_POST["d2"];
        $porcentaje=$_POST["p2"];
        $nombre=$_POST["id_materia2"];
        $id=$_POST["id_per"];
        $trimestre=$_POST["t2"];
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

            $consulta = "select id from materias where nombre = '".$nombre."'";
                                    $res = mysqli_query($conexion,$consulta);
                                    $fila = mysqli_fetch_array($res);
                                    $id_materia = $fila[0];

            $peticion= "update perfiles set descripcion=
            '".$descripcion."', porcentaje='".$porcentaje."',id_materia='".$id_materia."' ,trimestre='".$trimestre."' where id=".$id;
            $resultado=mysqli_query($conexion,$peticion);
            if($resultado)
            {
                echo "Modificado con exito";
            }
            else
            {
                echo "Error";
            }       
        }
         
    }  
?>
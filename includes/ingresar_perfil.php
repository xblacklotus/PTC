<?php include("config.inc");?>

<?php
    if(isset($_POST))
    {
        //Validar aqui

        $descripcion=$_POST["descripcion"];
        $porcentaje=$_POST["porcentaje"];
        $nombre=$_POST["metermateria"];
        
        $consulta6 = "select * from materias";
            $resp = mysqli_query($conexion,$consulta6);
            $i=0;
            while ($rsCon = mysqli_fetch_array($resp)) 
            {
                if($i==$nombre)
                {               
                    $id_materia=$rsCon['id'];
                    break;
                }
                $i++;
            }            
                                    
        $trimestre=$_POST["metertri"];
        $cons1="select porcentaje FROM perfiles where id_materia=".$id_materia." and trimestre=".$trimestre;
        $resp1=mysqli_query($conexion,$cons1);        
        if($resp1)
        {
            $cons1="select sum(porcentaje) FROM perfiles where id_materia=".$id_materia." and trimestre=".$trimestre;
            $resp1=mysqli_query($conexion,$cons1);
            $valido=false;
            if($resp1)
            {
                if($datos=mysqli_fetch_array($resp1))
                {
                    $suma=$datos[0]+$porcentaje;
                    if($suma<100 && $suma>0)
                    {                    
                        $valido=true;
                    }
                    else
                    {
                        $valido=false;
                        echo $suma;
                        echo " Porcentaje fuera de rango";                        
                    }
                }
                else
                {
                    echo "Hubo un error";
                }

            }
            else
            {            
                echo "Hubo un error";
            }
        }
        else
        {
            $valido=true;
        }

        if($valido)
        {
            if($descripcion =="" || $porcentaje =="" || $nombre <0 || $trimestre =="" )
            {
                echo "No se puede guardar datos vacios";
            }elseif (is_numeric($descripcion)) {
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
    }  
?>
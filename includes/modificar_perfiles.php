<?php include("config.inc");?>
<?php
    if(isset($_POST))
    {        
        $descripcion=$_POST["d2"];
        $porcentaje=$_POST["p2"];        
        $materia=$_POST['materia'];
        $id=$_POST["id_per"];
        $trimestre=$_POST["t2"];
        if($descripcion 
            =="" || $porcentaje =="" || $materia =="" || $trimestre =="" )
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
            $consulta6 = "select * from materias";
            $resp = mysqli_query($conexion,$consulta6);
            $i=0;
            while ($rsCon = mysqli_fetch_array($resp)) 
            {
                if($i==$materia)
                {               
                    $id_materia=$rsCon['id'];
                    break;
                }
                $i++;
            }
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
            if($valido)
            {

                $peticion= "update perfiles set descripcion=
                '".$descripcion."', porcentaje='".$porcentaje."',id_materia=".$id_materia.",trimestre='".$trimestre."' where id=".$id;
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
            else
            {
                echo "Porcentaje resultante invalido";
            }
        }
         
    }  
?>
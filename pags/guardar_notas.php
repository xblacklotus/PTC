<?php include("../includes/config.inc");?>

<?php      
    
    if (isset($_POST)) {        
        $p_id=$_POST['p_id'];
        $cantidad=$_POST['cantidad'];
        $falso=0;
        $notas_validas=true;

        for ($i=0; $i <$cantidad ; $i++) { 
            echo $_POST['nota'.$i].'  ';
            if(is_numeric($_POST['nota'.$i]) && is_numeric($_POST['nota'.$i]))
            {
                echo 'sas';
                if($_POST['nota'.$i]<=0 || $_POST['nota'.$i]>10)
                {
                    echo 'Nota '.$_POST['nota'.$i].' fuera de rango';
                    $notas_validas=false;
                }
            }
            else
            {
                $notas_validas=false;
                echo '"El dato '.$_POST['nota'.$i].' no es numero"';
            }
        }
        
        if($notas_validas)
        {
            for ($i=0; $i <$cantidad ; $i++)
            {
                $peticion="insert into notas_perfiles(nota,id_alumno,id_perfil) 
                           values(".$_POST['nota'.$i].",".$_POST['a_id'.$i].",".$p_id.")";
                if(!mysqli_query($conexion,$peticion))
                {
                    $falso++;
                    echo '<form name="notas" id="notas" method="post" action="guardar_notas.php">';
                    echo '<input type"hidden" name="post" id="post" value="'.$_POST.'" >';
                    echo '</form>';
                }
                else
                {
                    echo 'Exito';
                }

            }
            if($falso==0)
            {            
                header("Location:perfiles.php");
                exit();
            }     
            
        }   
        
    }
?>
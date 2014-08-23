<?php include("../includes/config.inc");?>

<?php      
    if (isset($_POST)) {        
        $p_id=$_POST['p_id'];
        $cantidad=$_POST['cantidad'];
        $falso=0;
        /*-------------------------------------------------------------
        ---------------------------------------------------------------
        ---------------------------------------------------------------
        ---------------------------------------------------------------
        ---------------------------------------------------------------
        ---------VALIDAR DATOS AQUI, ANTES DE ENTRAR AL FOR------------
        ---------------------------------------------------------------
        ---------------------------------------------------------------
        ---------------------------------------------------------------
        ---------------------------------------------------------------
        */        
        
        for ($i=0; $i <$cantidad ; $i++) { 

            $peticion="insert into notas_perfiles(nota,id_alumno,id_perfil) 
                       values(".$_POST['nota'.$i].",".$_POST['a_id'.$i].",".$p_id.")";
            if(!mysqli_query($conexion,$peticion))
            {
                $falso++;
                echo '<form name="notas" id="notas" method="post" action="guardar_notas.php">';
                echo '<input type"hidden" name="post" id="post" value="'.$_POST.'" >';
                echo '</form>';
            }
        }
        if($falso==0)
        {            
            header("Location:perfiles.php");
            exit();
        }
    }
?>
<script type="text/javascript">
    document.notas.submit();
</script>
<?php include("../includes/inheader.php");
include("../includes/aside-maestros.php");
?>
<div id="divperfiles">
<?php

    //if($_POST)
    //{
            //if(isset($_POST['elec_mat']))
            //
            //if(isset($_POST['user']))
            //{
                include("../includes/eleccion_materia.php");
            //}
               
            
            
            if(isset($_POST['ele_perf']))
            {
                include("../includes/elegir_perfil.php");
            }
        

    //}
?>
</div>
<?php include("../includes/footer.php");?>
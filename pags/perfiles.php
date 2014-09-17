<?php 

include("../includes/inheader.php");
//include("../includes/aside-maestros.php");
?>
<div id="divperfiles">
<?php

    //if($_POST)
    //{
            //if(isset($_POST['elec_mat']))
            //
            //if(isset($_POST['user']))
            //{
if(isset($_POST['user']))
{
    $id_profe=$_POST['user'];
    $cons1="select id from profesor where id_usuario=".$id_profe;
    $resp=mysqli_query($conexion,$cons1);
    $datos=mysqli_fetch_array($resp);
    $id_profe=$datos['id'];
}
if(isset($_POST['id_profe']))
{
    $id_profe=$_POST['id_profe'];
}

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
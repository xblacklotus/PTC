<?php 
session_start();
//Validar si se está ingresando con sesión correctamente
 
if (!isset($_SESSION['usuario']))
{
echo '<script language = javascript>
alert("Sesion invalida");
self.location = "loginAdmin.php";
</script>';
}
else
{
$id_profe = $_SESSION['user'];
include("../includes/super_header.php");
//include("../includes/aside-maestros.php");
?>

<h3><?php echo $id_profe;?></h3>
<div id="divperfiles">
<?php

    //if($_POST)
    //{
            //if(isset($_POST['elec_mat']))
            //
            //if(isset($_POST['user']))
            //{
                include("../includes/eleccion_materia_s.php");
            //}         
            
            if(isset($_POST['ele_perf']))
            {
                include("../includes/elegir_perfil_s.php");
            }
        

    //}
?>
</div>
<?php include("../includes/footer.php");}?>
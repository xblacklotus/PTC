<?php 
session_start();
//Validar si se está ingresando con sesión correctamente
if (!isset($_SESSION['userp'])){
echo '<script language = javascript>
alert("Sesion invalida");
self.location = "loginMaestro.php";
</script>';
}
else
{
include("../includes/inheader.php");?>
<script type="text/javascript" src="../js/funciones.js"></script>
<?php 
if (isset($_POST['ver_notas']))
{
    include("../includes/llenar_notas.php");
}
?>

<?php        
        include("../includes/llenar_notas.php");
?>
<?php include("../includes/footer.php");}?>
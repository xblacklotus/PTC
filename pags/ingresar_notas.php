<?php include("../includes/inheader.php");?>
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
<?php include("../includes/footer.php");?>
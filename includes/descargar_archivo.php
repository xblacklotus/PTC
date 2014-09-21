<?php include("../includes/inheader.php");?>
<?php
//$kaka=1;
$qry = "select tipo, contenido from archivos WHERE id='3'";
 $res = mysqli_query($qry);
 $tipo = mysql_result($res, 0, "tipo");
 $contenido = mysql_result($res, 0, "contenido");

 header("Content-type: $tipo");
 print $contenido;



?>


<?php include("../includes/footer.php");?>          
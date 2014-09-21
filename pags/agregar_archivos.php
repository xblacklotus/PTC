<?php include("../includes/inheader.php");?>


<form enctype="multipart/form-data" action="../includes/guardar_archivo.php" method="post">
Descripción <input type="text" name="titulo" size="30">
Ubicación <input type="file" name="archivito">
<input type="submit" value="Enviar archivo">
</form>


<?php include("../includes/footer.php");?>          
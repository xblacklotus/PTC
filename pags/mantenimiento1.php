<?php include("../includes/inheader.php");?>
<script type="text/javascript" src="../js/funciones.js"></script>

<form name="form" method="post" >
<label>Nombre de sección</label>
<input type="text" id="nombre_seccion"></input>
<button type="button" class="pill orange" onclick="javascript:ingresar_seccion();" ><i class="icon-plus-sign">Ingresar</i></button>          
</form>
<div id="divprueba"></div>
<?php include("../includes/footer.php");?>
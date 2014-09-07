<?php include("../includes/inheader.php");?>
<script type="text/javascript" src="../js/funciones.js"></script>

<form name="form" method="post" >
<label>Nombres</label>
<input type="text" id="nombre_maestro"></input>
<label>Apellidos</label>
<input type="text" id="apellido_maestro"></input>
<label>#Usuario</label>
<input type="text" id="usuario"></input>
<button type="button" class="pill orange" onclick="javascript:ingresar_maestro();" ><i class="icon-plus-sign">Ingresar</i></button>          
</form>
<div id="divprueba"></div>
<?php include("../includes/footer.php");?>
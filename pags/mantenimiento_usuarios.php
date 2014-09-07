<?php include("../includes/inheader.php");?>
<script type="text/javascript" src="../js/funciones.js"></script>

/**Agergar usuarios**/
<form name="formIng" method="post">
<label>contraseña de usuario</label>
<input type="password" id="contra_usu"></input>
<label>confirmar contraseña :</label>
<input type="password" id="contra_rea"></input>
<button type="button" class="pill orange" onclick="javascript:ingresar_usuario();"><i class="icon-plus-sign">Ingresar</i></button>
</form>
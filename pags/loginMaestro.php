<?php include("../includes/header2.php");?>



	<CENTER><h1>MAESTROS</h1></CENTER>
	<form name="formLogin" id="formLogin" method="post" class="vertical">
		<fieldset>
			<legend>Identificación Requerida</legend>
			<!-- Placeholder Text -->
			<label for="user">Usuario</label>
			<input id="user" type="text" name="user" placeholder="Ej:123" required />			    
			<!-- Placeholder Text -->
			<label for="pwd">Contraseña</label>
			<input id="pwd" name ="pwd" type="password" placeholder="12345" required/>
			<input type="button" value="Entrar" onclick="javascript:logear_profesor();">
		</fieldset>
	</form>
<?php include("../includes/footer2.php");?>   
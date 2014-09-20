<?php include("../includes/header2.php");?>



	<CENTER><h1>Administradores</h1></CENTER>
	<form name="formLogin" id="formLogin" method="post" action="../includes/loguear_super.php" class="vertical">
		<fieldset>
			<legend>Identificación Requerida</legend>
			<!-- Placeholder Text -->
			<label for="user">Usuario</label>
			<input id="user" type="text" name="user" placeholder="Ej:Ab_c123" required />
			<!-- Placeholder Text -->
			<label for="pwd">Contraseña</label>
			<input id="pwd" name ="pwd" type="password" placeholder="Abc_12345" required/>
			<input type="submit" value="Entrar">
		</fieldset>
	</form>
<?php include("../includes/footer2.php");?>   
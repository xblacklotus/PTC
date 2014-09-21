<?php include("../includes/header2.php");?>



	<CENTER><h1>ALUMNOS</h1></CENTER>
	<form name="formLogin" id="formLogin" method="post" action="../includes/loguear_alumno.php" class="vertical">
		<fieldset>
			<legend>Identificación Requerida</legend>
			<!-- Placeholder Text -->
			<label for="user">Usuario</label>
			<input id="user" type="text" name="user" placeholder="Ej:123" required />
			    
			<!-- Placeholder Text -->
			<label for="pwd">Contraseña</label>
			<input id="pwd" name ="pwd" type="password" placeholder="12345" required/>
			<button type="submit" value="Entrar">Ingresar</button>
		</fieldset>
	</form>
<?php include("../includes/footer2.php");?>             
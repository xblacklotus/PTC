<?php
session_start();

if ($_SESSION['userp'])
{	
	session_destroy();
	echo '<script language = javascript>	
	self.location = "../pags/loginMaestro.php";
	</script>';
}
else
{
	echo '<script language = javascript>
	alert("No hay una sesion valida");
	self.location = "../pags/loginMaestro.php";
	</script>';	
}
?>
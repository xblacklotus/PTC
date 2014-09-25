<?php
session_start();

if ($_SESSION['usuario'])
{	
	session_destroy();
	echo '<script language = javascript>	
	self.location = "../index.php";
	</script>';
}
else
{
	echo '<script language = javascript>
	alert("No hay una sesion valida");
	self.location = "../index.php";
	</script>';	
}
?>
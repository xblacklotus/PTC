<?php
session_start();

if ($_SESSION['user'])
{	
	session_destroy();
	echo '<script language = javascript>	
	self.location = "../index2.php";
	</script>';
}
else
{
	echo '<script language = javascript>
	alert("No hay una sesion valida");
	self.location = "../index2.php";
	</script>';	
}
?>
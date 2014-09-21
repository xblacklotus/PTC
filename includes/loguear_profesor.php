<?php
	include("config.inc");
//Inicio de variables de sesión
if (!isset($_SESSION)) {
  session_start();
}

if(isset($_POST))
{

	$user=$_POST['user'];
	$pwd=$_POST['pwd'];

	if($user == "" || $pwd=="")
	{
		echo "Complete los datos";
	}
	else
	{
		$consulta="select p.id as _id
					from  usuario as u,profesor as p
					where p.id_usuario=u.id
					and contraseña=".$pwd."
					and p.id_usuario=".$user;
		$resp=mysqli_query($conexion,$consulta);
		if($resp)
		{
			if($dato=mysqli_fetch_array($resp))
			{					
				if($dato["_id"])
				{			
					echo "hola";
					$_SESSION['userp'] = $dato['_id'];						
					header("Location:../pags/perfiles.php");
				}
				else
				{						
					echo '<script language = javascript>
						alert("Usuario o Password errados, por favor verifique.")
						self.location = "../pags/loginMaestro.php"
						</script>';						
				}
			}
			else
			{
				echo '<script language = javascript>
						alert("Usuario o Password errados, por favor verifique.")
						self.location = "../pags/loginMaestro.php"
						</script>';			
			}
		}
		else
		{
			echo '<script language = javascript>
						alert("Usuario o Password errados, por favor verifique.")
						self.location = "../pags/loginMaestro.php"
						</script>';			
		}
	}
}
else
{
	echo '<script language = javascript>
						alert("Pagina invalida")
						self.location = "../pags/loginMaestro.php"
						</script>';	
}	
?>
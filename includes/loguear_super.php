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
		$consulta="select usuario from super_usuario where usuario='".$user."' and contra='".$pwd."'";		
		$resp=mysqli_query($conexion,$consulta);
		if($resp)
		{
			if($dato=mysqli_fetch_array($resp))
			{					
				if($dato["usuario"])
				{			
					echo "hola";
					$_SESSION['user'] = $dato['usuario'];						
					header("Location:../pags/mantenimientos.php");
				}
				else
				{						
					echo '<script language = javascript>
						alert("Usuario o Password errados, por favor verifique.'.$dato.'")
						self.location = "../pags/loginAdmin.php"
						</script>';
				}
			}
			else
			{
				echo '<script language = javascript>
						alert("Usuario o Password errados, por favor verifique.")
						self.location = "../pags/loginAdmin.php"
						</script>';			
			}
		}
		else
		{
			echo '<script language = javascript>
						alert("Problemas conectando con el servidor");
						self.location = "../pags/loginAdmin.php"
						</script>';			
		}
	}
}
else
{
	echo '<script language = javascript>
						alert("Pagina invalida")
						self.location = "../pags/loginAdmin.php"
						</script>';	
}	
?>
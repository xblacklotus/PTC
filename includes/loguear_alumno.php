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
		$consulta="select a.id as _id
					from  usuario as u,alumno as a
					where a.id_usuario=u.id
					and contraseña=".$pwd."
					and a.id_usuario=".$user;
		$resp=mysqli_query($conexion,$consulta);
		if($resp)
		{
			if($dato=mysqli_fetch_array($resp))
			{					
				if($dato["_id"])
				{			
					echo "hola";
					$_SESSION['user'] = $dato['_id'];						
					header("Location:../pags/Menu_Alumno.php");
				}
				else
				{						
					echo '<script language = javascript>
						alert("Usuario o Password errados, por favor verifiq2222ue.")
						self.location = "../pags/loginAlumno.php"
						</script>';						
				}
			}
			else
			{
				echo '<script language = javascript>
						alert("Hubo un problema al conseguir la respuesta'.$consulta.'");
						self.location = "../pags/loginAlumno.php"
						</script>';			
			}
		}
		else
		{
			echo '<script language = javascript>
						alert("No se pudo establecer la conexion con el servidor")
						self.location = "../pags/loginAlumno.php"
						</script>';			
		}
	}
}
else
{
	echo '<script language = javascript>
						alert("Pagina invalida")
						self.location = "../pags/loginAlumno.php"
						</script>';	
}	
echo 1;
?>
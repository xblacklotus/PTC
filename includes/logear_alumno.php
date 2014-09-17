<?php
	include("config.inc");
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
			$consulta="select a.id
						from  usuario as u,alumno as a
						where a.id_usuario=u.id
						and contraseña=".$pwd."
						and a.id_usuario=".$user;
			$resp=mysqli_query($conexion,$consulta);
			if($resp)
			{
				if($dato=mysqli_fetch_array($resp))
				{
					if($dato!="")
					{
						echo "Exito";						
					}
					else
					{
						echo "Id o contraseña incorrectas";
					}
				}
				else
				{
					echo "Id o contraseña incorrectas";
				}
			}
			else
			{
				echo "error";
			}
		}
	}
	else
	{
		echo "pagina invalida";
	}
?>
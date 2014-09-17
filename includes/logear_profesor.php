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
			$consulta="select p.id
						from  usuario as u,profesor as p
						where p.id_usuario=u.id
						and contraseña=".$pwd."
						and p.id_usuario=".$user;
			$resp=mysqli_query($conexion,$consulta);
			if($resp)
			{
				if($dato=mysqli_fetch_array($resp))
				{
					if($dato!="")
					{
						echo "1";						
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
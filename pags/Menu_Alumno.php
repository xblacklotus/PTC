<?php session_start();
//Validar si se está ingresando con sesión correctamente
if (!isset($_SESSION['user'])){
echo '<script language = javascript>
alert("Sesion invalida");
self.location = "loginAlumno.php";
</script>';
}
else
{;?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <title>AULA VIRTUAL</title>
        <link rel="stylesheet" type="text/css" href="../css/base_menuAlumno.css" />
        <link rel="stylesheet" type="text/css" href="../css/Menu_alumno.css" />
    </head>
    <body>
        <div class="container">
           
			<header>
			
				<h1>Área Estudiantil</h1>	
				<div class="support-note">
					<span class="no-csstransforms">CSS transforms are not supported in your browser</span>
					<span class="no-csstransitions">CSS transitions are not supported in your browser</span>
					<span class="note-ie">Sorry, only modern browsers.</span>
				</div>
				
			</header>
			
			<section class="main">
			
				<ul class="ch-grid">
					<li>
						<div class="ch-item ch-img-1">
							<div class="ch-info">
								<h3>Aula Virtual</h3>
								<p><a href="AV_principal.php">Entrar</a></p>
							</div>
						</div>
					</li>
					
					<li>
						<div class="ch-item ch-img-3">
							<div class="ch-info">
								<h3>Reporte de Notas</h3>
								<p><a href="notas.php">Entrar</a></p>
							</div>
						</div>
					</li>
				</ul>
				
			</section>
			
        </div>
    </body>
</html><?php } ?>
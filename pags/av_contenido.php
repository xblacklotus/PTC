<?php 
session_start();
//Validar si se está ingresando con sesión correctamente
if (!isset($_SESSION['user'])){
echo '<script language = javascript>
alert("Sesion invalida");
self.location = "loginAlumno.php";
</script>';
}
else
{
include ("../includes/header_aula.php");
    include("../includes/inheader.php");?>




<?php include("../includes/config.inc");?>

<?php
	
if (isset($_POST)) {
         $idd=$_POST['id'];

         $abc = "SELECT nombre FROM materias where id='".$idd."'";
    $resultao10=mysqli_query($conexion,$abc);
    $fff=mysqli_fetch_array($resultao10);

	echo '<div  class="tab-content">
	<ul class="breadcrumbs alt1">
		<li><a href="AV_principal.php">Home</a></li>
		<li><a>'.$fff[0].'</a></li>
		</ul>';
          $qry = "SELECT id, nombre, titulo, size tipo FROM archivos where id_materia='".$idd."'";
    //$res = mysql_query($qry);
    		$resul=mysqli_query($conexion,$qry);
    		echo '<ul class="tabs left">
			<li><a href="#tabr1">archivos</a></li>
			<li><a href="#tabr2">Anuncios</a></li>
			<li><a href="#tabr3">Perfiles</a></li>

			</ul><div id="tabr1" class="tab-content">';
			echo '<!-- Table --><table id="tbmats" class="striped tight sortable" 
              cellspacing="0" cellpadding="0" style="max-width="500px">
            <thead><tr>
                
                <th>Nombre del archivo</th>
                <th >Descripcion</th>
                <th max-width="100px">Peso(MB)</th>  
                <th max-width="50px">Accion</th>            
            </tr></thead>
            ';
    while($fila=mysqli_fetch_array($resul))
            {
                echo '<tr>
                        <form name="formArch" method="post" action="descargar_archivo.php" >

                        <td> '.$fila[1].'</td>
                        <td> '.$fila[2].'</td> 
                        <td> '.$fila[3].'</td> 
                       <td>
                       <input class="bids" type="hidden" name="id" value='.$fila[0].'> </input> <button type="submit" class="pill orange"   >
                       <i class="icon-plus-sign">Descargar</i></button>
                       </td> 

                        </form>                   
                     </tr>';
            }
                 echo '</table>';
                 echo '</div><div id="tabr2" class="tab-content">';


                 $peticion ="select * from anuncios where id_materia='".$idd."'";
                 $resul2=mysqli_query($conexion,$peticion);
                 echo '
                 <!-- Table --><table id="tbco" class="striped tight sortable" 
              cellspacing="0" cellpadding="0" style="max-width="500px">
            <thead><tr>
                
                <th>Titulo</th>
                <th >Anuncio</th>
                <th max-width="100px">Fecha de tarea</th>  
                <th max-width="50px">Fecha de entrega</th>            
            </tr></thead>
            ';
            while($fila2=mysqli_fetch_array($resul2))
            {
                echo '<tr>
                        <form name="formArch" method="post" action="descargar_archivo.php" >

                        <td> '.$fila2[2].'</td>
                        <td> '.$fila2[3].'</td> 
                        <td> '.$fila2[4].'</td> 
                        <td> '.$fila2[5].'</td> 
                        </form>                   
                     </tr>';
            }
            echo '</table>';

                 echo '</div><div id="tabr3" class="tab-content">
		                 <ul class="tabs left">
						<li><a href="#tab1">Primer Trimestre</a></li>
						<li><a href="#tab2">Segundo Trimestre</a></li>
						<li><a href="#tab3">Tercer Trimestre</a></li>
						</ul>

						<div id="tab1" class="tab-content">';
						$peticion2 ="select * from perfiles where id_materia='".$idd."' AND trimestre='1'";
						//var_dump($peticion2);
                 		$resul3=mysqli_query($conexion,$peticion2);
                 		echo '
				                 <!-- Table --><table id="tbco" class="striped tight sortable" 
				              cellspacing="0" cellpadding="0" style="max-width="500px">
				            <thead><tr>
				                
				                <th>Perfil</th>
				                <th >Porcentaje</th>          
				            </tr></thead>
				            ';
				            while($fila3=mysqli_fetch_array($resul3))
					            {
					                echo '<tr>
					                        <form name="formArch" method="post" action="descargar_archivo.php" >

					                        <td> '.$fila3[1].'</td>
					                        <td> '.$fila3[2].'</td> 
					                        </form>                   
					                     </tr>';
					            }
					            echo '</table>';
                 			echo '</div><div id="tab2" class="tab-content">';


                 			$peticion3 ="select * from perfiles where id_materia='".$idd."' AND trimestre='2'";
                 		$resul4=mysqli_query($conexion,$peticion3);
                 		echo '
				                 <!-- Table --><table id="tbco" class="striped tight sortable" 
				              cellspacing="0" cellpadding="0" style="max-width="500px">
				            <thead><tr>
				                
				                <th>Perfil</th>
				                <th >Porcentaje</th>          
				            </tr></thead>
				            ';
				            while($fila4=mysqli_fetch_array($resul4))
					            {
					                echo '<tr>
					                        <form name="formArch" method="post" action="descargar_archivo.php" >

					                        <td> '.$fila4[1].'</td>
					                        <td> '.$fila4[2].'</td> 
					                        </form>                   
					                     </tr>';
					            }
					            echo '</table>';
                 			echo '</div><div id="tab3" class="tab-content">';

                 			$peticion4 ="select * from perfiles where id_materia='".$idd."' AND trimestre='1'";
                 		$resul5=mysqli_query($conexion,$peticion4);
                 		echo '
				                 <!-- Table --><table id="tbco" class="striped tight sortable" 
				              cellspacing="0" cellpadding="0" style="max-width="500px">
				            <thead><tr>
				                
				                <th>Perfil</th>
				                <th >Porcentaje</th>          
				            </tr></thead>
				            ';
				            while($fila5=mysqli_fetch_array($resul3))
					            {
					                echo '<tr>
					                        <form name="formArch" method="post" action="descargar_archivo.php" >

					                        <td> '.$fila5[1].'</td>
					                        <td> '.$fila5[2].'</td> 
					                        </form>                   
					                     </tr>';
					            }
					            echo '</table>';
                 			echo '</div></div><div id="tabr2" class="tab-content">
                 			</div>';


     }
 }
?>
     
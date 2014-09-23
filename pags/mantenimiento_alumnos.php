<?php
session_start();
//Validar si se está ingresando con sesión correctamente
if (!isset($_SESSION['usuario'])){
echo '<script language = javascript>
alert("Sesion invalida");
self.location = "loginAdmin.php";
</script>';
}
else
{  
 include("../includes/super_header.php");?>
<script type="text/javascript" src="../js/funciones.js"></script>

//Agergar alumno//
<form name="formIng" method="post">
<label>Nombre Alumno</label>
<input type="text" id="nombre"></input>
<label>Apellido :</label>
<input type="text" id="apellido"></input>
<label>Grado</label>
<select id='gradd' >
<option>7</option>
<option>8</option>
<option>9</option>
</select>
<?php
$id_alumnos=array();
$i=0;
$peticion= "select  u.id from usuario as u, alumno as al where u.id = al.id_usuario";
            $resultado=mysqli_query($conexion,$peticion);
            if($resultado)
            {
              while($fila=mysqli_fetch_array($resultado)){
              	array_push($id_alumnos, $fila["id"]);
              	//echo $id_alumnos[$i];
              	$i++;
              	
              }
            } 

$id_profe = array();
$i=0;
$peticion= "select  u.id from usuario as u, profesor as pr where u.id = pr.id_usuario";
            $resultado=mysqli_query($conexion,$peticion);
            if($resultado)
            {
              while($fila=mysqli_fetch_array($resultado)){
              	array_push($id_profe, $fila["id"]);
              	//echo $id_profe[$i];
              	$i++;
              }
            } 


function imprimirUsuario($conexion,$id_profe,$id_alumnos,$valor_propio)
{
$i=0;  
$id_comparacion = array();
$id_vacios= array();
    $peticion= "select  id from usuario";
            $resultado=mysqli_query($conexion,$peticion);
            if($resultado)
            {
              while($fila=mysqli_fetch_array($resultado)){
                array_push($id_comparacion, $fila["id"]);
                //echo $id_comparacion[$i];
                $i++;
              }
            }
            $con= sizeof($id_alumnos);
            $con2=sizeof($id_profe);
            $con3=sizeof($id_comparacion);

            for ($i=0; $i <$con ; $i++) { 
              for ($j=0; $j <$con3 ; $j++) { 
                  if($id_comparacion[$j]==$id_alumnos[$i])
                  {
                    $id_comparacion[$j]=-1;
                  }
              }
            }
            for ($i=0; $i < $con2; $i++) { 
              for ($j=0; $j < $con3; $j++) { 
                 if($id_comparacion[$j]==$id_profe[$i]){
                  $id_comparacion[$j]=-1;
          //echo "gyf".$id_comparacion[$j];
                 }
              }
            }
            echo "Usuario";
            echo "
                 <select id='userr' name='userr' >";
                 if($valor_propio!="-1")
                 {
                    echo "<option> ".$valor_propio."</option>";
                 }
            for ($i=0; $i <$con3 ; $i++) {
              if($id_comparacion[$i]>0){
                 echo "<option> ".$id_comparacion[$i]."</option>";
              }
            }
         echo "</select>";
}
imprimirUsuario($conexion,$id_profe,$id_alumnos,"-1");


?>
<?php
$id_s=array();
$letra=array();
$i=0;
echo "Seccion :";
$peticion= "select id from seccion";
$resultado=mysqli_query($conexion,$peticion);
            if($resultado)
            {
              while($fila=mysqli_fetch_array($resultado)){
              	array_push($id_s, $fila["id"]);
              	//echo $id_s[$i];
              	$i++;
              }
            } 
              

?>
<select name='secc' >
<?php
   $secciones="";
   $peticion= "select * from seccion";
   $resultado=mysqli_query($conexion,$peticion);
     while ($rsSecc = mysqli_fetch_array($resultado)) {
			echo '<option>'.$rsSecc['nombre'].'</option>';

			$secciones=$secciones."<option>".$rsSecc['nombre']."</option>";
		}
?>
</select>
<button type="button" class="pill orange" onclick="javascript:ingresar_alumno();"><i class="icon-plus-sign">Ingresar</i></button>
</form>
<?php
			$consulta = 'select a.*,s.nombre as seccion FROM alumno as a,seccion as s
where a.id_seccion=s.id';

			$res = mysqli_query($conexion,$consulta);
		?>
		<table>
			<th></th>
			<?php $i = 0;
				while ($rsSecc = mysqli_fetch_array($res)) {
			?>
	
			<tr>
			
				<td>
				<form name="formMo<?php echo $i ?>" method="post">
				<?php 
					$grados;


					if($rsSecc['grado']==7)
					{
						$grados='<select id="gradd" name="grade">
									<option>7</option>
									<option>8</option>
									<option>9</option>
								</select>';
					}
					else if($rsSecc['grado']==8)
					{
						$grados='<select id="gradd" name="grade">
									<option>8</option>
									<option>7</option>
									<option>9</option>
								</select>';
					}
					else 
					{
						$grados='<select id="gradd" name="grade">
									<option>9</option>
									<option>7</option>
									<option>8</option>
								</select>';
					}

				echo '<input type="text" name="name" value="'.$rsSecc['nombres'].'"></input> 
				<input class="bids" type="hidden" name="id_alu" value='.$rsSecc['id'].'>
				<input type="text" name="nick" value="'.$rsSecc['apellidos'].'"></input>				
				'.$grados.'
				<select id="section'.$i.'" name="section" >
				'.$secciones.'
				</select>
        ';
        imprimirUsuario($conexion,$id_profe,$id_alumnos,$rsSecc['id_usuario']);
        echo '<button type="button" class="pill orange" onclick="javascript:modificar_alumno('.$i.');" >
				<i class="icon-plus-sign">Modificar</i></button>
				<button type="button" class="pill orange" onclick="javascript:eliminar_alumno('.$i.');">
				<i class="icon-minus-sign">Eliminar</i></button>'; $i ++;?> 
				</form>
				</td>
				<?php  
				echo '<script>document.getElementById("section'.($i-1).'").value="'.$rsSecc['seccion'].'"; </script>';
				?>
			</tr>
			   
			<?php  }?>
		</table>
    <div  class='tab-content'>
    <h5>Agregar lista de alumnos desde un archivo en excel:</h5>
      <form  method="post" action="../includes/agregar_alumnosPrueba2.php" enctype="multipart/form-data">
          <input type="file" name="file"><br>
          <input type="submit" value="Subir lista de alumnos">
      </form>
    </div>

<?php include("../includes/footer.php");}?>

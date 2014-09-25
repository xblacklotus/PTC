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

<form name="forming" method="post" >
<label>Nombres</label>
<input type="text" id="nombre_maestro"></input>
<label>Apellidos</label>
<input type="text" id="apellido_maestro"></input>
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
$id_comparacion = array();
$id_vacios= array();

$i=0;
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
                 <select id='usuario' name='usuario' >";
            for ($i=0; $i <$con3 ; $i++) {             	
            	if($id_comparacion[$i]>0){
                 echo "
                 <option> ".$id_comparacion[$i]."</option>";
            	}
            }
         echo "</select>";

?>
<button type="button" class="pill orange" onclick="javascript:ingresar_maestro();" ><i class="icon-plus-sign">Ingresar</i></button>          
</form>
<div id="divprueba"></div>

<?php
			$consulta = "select * from profesor";
			$res = mysqli_query($conexion,$consulta);
			
			
		?>
		<br><br>
		<table  class="tablestyle" cellspacing="0" cellpadding="0" style="max-width="100px"">
			<thead><tr>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Accion</th>
        
    	</tr></thead>
			<?php $i = 0; 
				while ($rsSecc = mysqli_fetch_array($res)) { 
			?>
	
			<tr>
			
				<td>
				<form name="formMo<?php echo $i ?>" method="post">
				<?php echo '<input type="text" id="nombre2" value="'.$rsSecc['nombres'].'"></input> ';?></td> 
				<td><?php echo '<input type="text" id="apellido2" value="'.$rsSecc['apellidos'].'"></input> ';?></td>
				<td><?php echo '<input class="bids" type="hidden" name="id_ma" value='.$rsSecc['id'].'> </input>
				<button type="button" class="pill orange" onclick="javascript:modificar_maestro('.$i.');" >
				<i class="icon-plus-sign">Modificar</i></button>
				<button type="button" class="pill orange" onclick="javascript:eliminar_maestro('.$i.');">
				<i class="icon-minus-sign">Eliminar</i></button>'; $i ++;?> 
				</form>
				</td>
				
			</tr>
			
			<?php  }?>
		</table>


<?php include("../includes/footer.php");}?>
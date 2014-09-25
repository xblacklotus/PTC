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
<label>Descripcion</label>
<input type="text" id="descripcion"></input>
<label>Porcentaje</label>
<input type="text" id="porcentaje"></input>
<label>Materia :</label>
<input class="bids" type="hidden" name="metermateria" id="metermateria"/>
	<select id="materias" onchange="combo(this,'metermateria')">
	<?php 
		$sql = "select m.*,s.nombre as seccion from materias as m, seccion as s where m.id_seccion=s.id order by m.id";
		$res = mysqli_query($conexion,$sql);
		
		while ($rsSecc = mysqli_fetch_array($res))
		{				
			
			echo '<option>'.$rsSecc['nombre'].', '.$rsSecc['grado'].', '.$rsSecc['seccion'].'°</option>';
		}

	?>
	</select>
	<?php 
	
	
	?>
</input>
<label>Trimestre :</label>
<input class="bids" type="hidden" name="metertri" id="metertri"/>
<select contenteditable="false" id="trimestres" onchange="combo(this,'metertri')">
	<option></option>
	<option>1</option>
	<option>2</option>
	<option>3</option>
</select>
</input>
<button type="button" class="pill orange" onclick="javascript:ingresar_perfiles();" ><i class="icon-plus-sign">Ingresar</i></button>          
</form>
<div id="divprueba"></div>

<?php
			$consulta = "select * from perfiles";
			$res = mysqli_query($conexion,$consulta);
			
			
		?>
		<br><br>
		<table class="tablestyle">
		<tbody>
			<tr class="tablehead">
        <th>Descripcion</th>
        <th>Porcentaje</th>
        <th>Sección</th>
        <th>Trimestre</th>
        <th>Acción</th>
    	</tr>
			<?php $i = 0; 
				while ($rsPer = mysqli_fetch_array($res)) { 
					$sql="select m.nombre from materias as m, perfiles as  p
					where m.id=p.id_materia and p.id_materia=".$rsPer['id_materia']."";
					$re = mysqli_query($conexion,$sql);
					$fila=mysqli_fetch_array($re);
			?>
	
			<tr>
			
				<td>
				<form name="formMo<?php echo $i ?>" method="post">
				<?php echo '<input type="text" id="d2" value="'.$rsPer['descripcion'].'"></input>';?></td>
				<td><?php echo'	<input type="text" id="p2" value='.$rsPer['porcentaje'].'></input> ';?></td>
				<td><?php 
				$materias1='<select id="materias'.$i.'">';
				$sql1 = "select m.*,s.nombre as seccion from materias as m, seccion as s where m.id_seccion=s.id order by m.id";
				$res1 = mysqli_query($conexion,$sql1);
				while ($rsSecc = mysqli_fetch_array($res1)) {
					$materias1=$materias1.'<option>'.$rsSecc['nombre'].', '.$rsSecc['grado'].'°, '.$rsSecc['seccion'].'</option>';
				}
				$materias1=$materias1.'</select>';			
				echo $materias1;
				?></td>
				<td><?php echo '<input type="text" id="t2" value='.$rsPer['trimestre'].'> </input>';?></td>
				<td>
				<?php echo '	
				<input class="bids" type="hidden" name="id_per" id="id_per" value='.$rsPer['id'].'> 
				<button type="button" class="pill orange" onclick="javascript:modificar_perfiles('.$i.');" >
				<i class="icon-plus-sign">Modificar</i></button>
				<button type="button" class="pill orange" onclick="javascript:eliminar_perfiles('.$i.');">
				<i class="icon-minus-sign">Eliminar</i></button>';
				 $i ++;


				$sql12 = "select m.nombre as materia,m.grado,s.nombre as seccion
						from materias as m,seccion as s
						where m.id_seccion=s.id
						and m.id=".$rsPer['id_materia'];
				$res12 = mysqli_query($conexion,$sql12);
				if($rsSecc = mysqli_fetch_array($res12))
				{
					echo '<script>document.getElementById("materias'.($i-1).'").value="'.$rsSecc['materia'].', '.$rsSecc['grado'].'°, '.$rsSecc['seccion'].'"; </script>';					
				}
				?> 
				
				</td>
				
				</tr>
			</form>
			<?php  }?>
			</tbody>
		</table>

		<div id="prueba1"></div>
<?php include("../includes/footer.php");}?>
<?php include("../includes/inheader.php");?>
<?php include("../includes/config.inc");?>
<script type="text/javascript" src="../js/funciones.js"></script>

<!--Formulario para ingresar una materia-->
/**Agregar materias**/
<form name="form" method="post">
<label>Nombre de la materia: </label>
<input type="text" id="nombre_materia" required></input>
<label>Grado :</label>
<input class="bids" type="hidden" name="inputgra" id="inputgra"/>
<select contenteditable="false" id="grados" onchange="combo(this,'inputgra')">
	<option></option>
	<option>7</option>
	<option>8</option>
	<option>9</option>
</select>
</input>
<label>Sección :</label>
<input class="bids" type="hidden" name="inputse" id="inputse"/>
	<select id="secciones" onchange="combo(this,'inputse')">
	<?php
		echo '<option></option>';
		$sql = "select * from seccion";
		$res = mysqli_query($conexion,$sql);
		while ($rsSecc = mysqli_fetch_array($res)) {
			echo '<option>'.$rsSecc['nombre'].'</option>';
		}

	?>
	</select>
</input>
<button type="button" class="pill orange" onclick="javascript:ingresar_materias();"><i class="icon-plus-sign">Ingresar</i></button>
</form>


<!--Formulario para modificar y eliminar una materia-->
/**Modificar, eliminar materias**/
<?php
	$consulta = "select * from materias";
	$res = mysqli_query($conexion,$consulta);					
?>
<table>
	<th>Materias</th>
		<?php $i = 0; 

			while ($rsMat = mysqli_fetch_array($res)) { 
				$sql = "select s.nombre 
				from seccion as s, materias as m
				where s.id = m.id_seccion
				and m.id_seccion =".$rsMat['id_seccion']."";
				$re = mysqli_query($conexion,$sql);
				$fila = mysqli_fetch_array($re);
		?>
	
	<tr>
			
		<td>
			<form name="formMo<?php echo $i ?>" method="post">
			<?php echo '<input type="text" id="new_ma" value="'.$rsMat['nombre'].'"></input>
			<input type="text" id="new_gra" value="'.$rsMat['grado'].'"></input>
			<input type="text" id="new_se" value="'.$fila[0].'"></input>  
			<input class="bids" type="hidden" name="ma_id" value='.$rsMat['id'].'> 
			<button type="button" class="pill orange" onclick="javascript:modificar_materia('.$i.');" >
			<i class="icon-plus-sign">Modificar</i></button>
			<button type="button" class="pill orange" onclick="javascript:eliminar_materia('.$i.');">
			<i class="icon-minus-sign">Eliminar</i></button>'; $i ++;?> 
			</form>
		</td>	
	</tr>
			
		<?php  }?>
</table>

<?php include("../includes/footer.php");?>
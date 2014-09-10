<?php include("../includes/inheader.php");?>
<script type="text/javascript" src="../js/funciones.js"></script>

<form name="forming" method="post" >
<label>Descripcion</label>
<input type="text" id="descripcion"></input>
<label>Porcentaje</label>
<input type="text" id="porcentaje"></input>
<label>Materia :</label>
<input class="bids" type="hidden" name="metermateria" id="metermateria"/>
<input type="text" contenteditable="false"list="materias" name="materias" onchange="combo(this,'metermateria')">
	<datalist id="materias">
	<?php
		$sql = "select * from materias";
		$res = mysqli_query($conexion,$sql);
		while ($rsSecc = mysqli_fetch_array($res)) {
			echo '<option>'.$rsSecc['nombre'].'</option>';
		}

	?>
	</datalist>
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
		<table id="tbmats" class="striped tight sortable" cellspacing="0" cellpadding="0" style="max-width="100px"">
			<thead><tr>
        <th>Descripcion</th>
        <th>Porcentaje</th>
        <th>Sección</th>
        <th>Trimestre</th>
        <th>Acción</th>
    	</tr></thead>
			<th></th>
			<?php $i = 0; 
				while ($rsSecc = mysqli_fetch_array($res)) { 
			?>
	
			<tr>
			
				<td>
				<form name="formMo<?php echo $i ?>" method="post">
				<?php echo '<input type="text" id="descripcion2" value="'.$rsSecc['descripcion'].'"></input>';?></td>
				<td><?php echo'	<input type="text" id="porcentaje2" value="'.$rsSecc['porcentaje'].'"></input> ';?></td>
				<td><?php echo' <input type="text" id= "id_materia" value="'.$rsSecc['id_materia'].'"></input> ';?></td>
				<td>
				<?php echo '<input type="text" id="trimestre2" value='.$rsSecc['trimestre'].'> </input>';?></td>
				<td>
				<?php echo '	
				<button type="button" class="pill orange" onclick="javascript:modificar_perfiles('.$i.');" >
				<i class="icon-plus-sign">Modificar</i></button>
				<button type="button" class="pill orange" onclick="javascript:eliminar_perfiles('.$i.');">
				<i class="icon-minus-sign">Eliminar</i></button>'; $i ++;?> 
				</form>
				</td>
				
			</tr>
			
			<?php  }?>
		</table>


<?php include("../includes/footer.php");?>
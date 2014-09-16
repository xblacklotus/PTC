<?php include("../includes/inheader.php");?>
<?php include("../includes/config.inc");?>
<script type="text/javascript" src="../js/funciones.js"></script>

<!--Formulario para ingresar una materia-->
/**Agregar materias**/
<form name="form" method="post">
<label>Nombre de la materia: </label>
<input type="text" id="nombre_materia" required></input>
<label>Profesor:</label>
<select id="profesor" onchange="combo(this,'inputse')">
<?php
	echo '<option></option>';
	$sql = "select nombres,apellidos from profesor";
	$res = mysqli_query($conexion,$sql);
	while ($rsSecc = mysqli_fetch_array($res)) {
		echo '<option>'.$rsSecc['nombres'].' '.$rsSecc['apellidos'].'</option>';
	}
?>
</select>
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
<button type="button" class="pill orange" onclick="javascript:ingresar_materias();"><i class="icon-plus-sign">Ingresar</i></button>
</form>


<!--Formulario para modificar y eliminar una materia-->
/**Modificar, eliminar materias**/
<?php
	$consulta = "select m.*,p.nombres,p.apellidos as apellidos from materias as m, profesor as p where m.id_profesor=p.id";
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
			

<?php
   
?>

		<td>
			<form name="formMo<?php echo $i ?>" method="post">

			<?php 
			$secciones="<select id='secciones".$i."'>";
		   $peticion= "select * from seccion";
		   $resultado=mysqli_query($conexion,$peticion);
		     while ($secc = mysqli_fetch_array($resultado)) {					
					$secciones=$secciones."<option>".$secc['nombre']."</option>";
				}
			$secciones=$secciones."</select>";			

			$grados;
					if($rsMat['grado']==7)
					{
						$grados='<select id="new_gra" name="grade">
									<option>7</option>
									<option>8</option>
									<option>9</option>
								</select>';
					}
					else if($rsMat['grado']==8)
					{
						$grados='<select id="new_gra" name="grade">
									<option>8</option>
									<option>7</option>
									<option>9</option>
								</select>';
					}
					else 
					{
						$grados='<select id="new_gra" name="grade">
									<option>9</option>
									<option>7</option>
									<option>8</option>
								</select>';
					}
					
			$profesores="<select id='profesor".$i."'>";
		   $peticion= "select * from profesor";
		   $resultado=mysqli_query($conexion,$peticion);
		     while ($secc = mysqli_fetch_array($resultado)) {					
					$profesores=$profesores."<option>".$secc['nombres']." ".$secc['apellidos']."</option>";
				}
			$profesores=$profesores."</select>";


			echo '<input type="text" id="new_ma" value="'.$rsMat['nombre'].'"></input>
			'.$profesores.'
			'.$grados.'			
			'.$secciones.'			
			<input class="bids" type="hidden" name="ma_id" value='.$rsMat['id'].'> 
			<button type="button" class="pill orange" onclick="javascript:modificar_materia('.$i.');" >
			<i class="icon-plus-sign">Modificar</i></button>
			<button type="button" class="pill orange" onclick="javascript:eliminar_materia('.$i.');">
			<i class="icon-minus-sign">Eliminar</i></button>'; $i ++;?> 
			</form>
		</td>	
	</tr>
			
		<?php

		echo '<script>
		document.getElementById("secciones'.($i-1).'").value="'.$fila[0].'";
		document.getElementById("profesor'.($i-1).'").value="'.$rsMat['nombres'].' '.$rsMat['apellidos'].'";
		</script>';
		  }?>
</table>

<?php include("../includes/footer.php");?>
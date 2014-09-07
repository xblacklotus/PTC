<?php include("../includes/inheader.php");?>
<?php include("../includes/config.inc");?>
<script type="text/javascript" src="../js/funciones.js"></script>


<form name="form" method="post" >
<label>Nombre de sección</label>
<input type="text" id="nombre_seccion"></input>
<button type="button" class="pill orange" onclick="javascript:ingresar_seccion();" ><i class="icon-plus-sign">Ingresar</i></button>          
</form>
<div id="divprueba"></div>

/**Modificar, Eliminar sección**/
		<?php
			$consulta = "select * from seccion";
			$res = mysqli_query($conexion,$consulta);
			
			
		?>
		<table>
			<th>Secciones</th>
			<?php $i = 0; 
				while ($rsSecc = mysqli_fetch_array($res)) { 
			?>
	
			<tr>
			
				<td>
				<form name="formMo<?php echo $i ?>" method="post">
				<?php echo '<input type="text" id="new_se" placeholder="'.$rsSecc['nombre'].'"></input> 
				<input class="bids" type="hidden" name="se_id" value='.$rsSecc['id'].'> 
				<button type="button" class="pill orange" onclick="javascript:modificar_seccion('.$i.');" >
				<i class="icon-plus-sign">Modificar</i></button>
				<button type="button" class="pill orange" onclick="javascript:eliminar_seccion('.$i.');">
				<i class="icon-minus-sign">Eliminar</i></button>'; $i ++;?> 
				</form>
				</td>
				
			</tr>
			
			<?php  }?>
		</table>





<?php include("../includes/footer.php");?>
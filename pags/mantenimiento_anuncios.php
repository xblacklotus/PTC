<?php include("../includes/inheader.php");?>
<?php include("../includes/config.inc");?>
<script type="text/javascript" src="../js/funciones.js"></script>

<!--Formulario para ingresar anuncios-->
<br>
/*********Ingresar un anuncio***********/
<?php 
	$id_profesor = 1;
	$n_materia = 'Sociales';
	echo '<h3>'.$n_materia.'</h3>';
?><!--Le damos el valor del id del profesor que se loguea-->
<form name="form" method="post">
<?php echo '<input class="bids" type="hidden" name="prof" id="prof" value="'.$id_profesor.'">'; ?>
<?php echo '<input class="bids" type="hidden" name="mat" id="mat" value="'.$n_materia.'">'; ?>
<label>Anuncio : </label>
<textarea id="anuncio" cols="50" rows="7" maxlength="250"></textarea>
<button type="button" class="pill orange" onclick="javascript:ingresar_anuncio();"><i class="icon-plus-sign">Agregar</i></button>
</form>


<!--formulario para eliminar los anuncios-->
<br>
/*********Eliminar un anuncio***********/
<?php
	$consulta = "select * from anuncios";
	$res = mysqli_query($conexion,$consulta);
?>
<table>
	<th>Anuncios</th>
	<?php
		$i = 0;
		while ($rsAnu = mysqli_fetch_array($res)) {
	?>
	<tr>
	<td>
		<form name="formAn<?php echo $i ?>" method="post">
		<?php
		echo '<textarea id="new_anu" cols="50" rows="7" maxlength="250">'.$rsAnu['anuncio'].'</textarea>
			<input class="bids" type="hidden" name="an_id" value='.$rsAnu['id'].'> 
			<button type="button" class="pill orange" onclick="javascript:modificar_anuncio('.$i.');" >
			<i class="icon-plus-sign">Modificar</i></button>
			<button type="button" class="pill orange" onclick="javascript:eliminar_anuncio('.$i.');">
			<i class="icon-minus-sign">Eliminar</i></button>'; $i ++; 
		?>
		</form>
	</td>
	</tr>
	<?php  }?>
</table>
<?php include("../includes/footer.php");?>
<?php  
session_start();
//Validar si se está ingresando con sesión correctamente
if (!isset($_SESSION['userp'])){
echo '<script language = javascript>
alert("Sesion invalida");
self.location = "loginMaestro.php";
</script>';
}
else{
	 include("../includes/inheader.php");?>
	<?php include("../includes/config.inc");?>
	<script type="text/javascript" src="../js/funciones.js"></script>

	<!--Formulario para ingresar anuncios-->
	<br>
	<?php 
	if($_POST)
	{


        $id_profesor=$_POST['m_id'];
			//***************Atento a modificar estos dos valores dependiendo de la materia en que se este**********
		$n_materia = 'Sociales'; //*************************************************************************************************//
		echo '<h3>'.$n_materia.'</h3>';
	?><!--Le damos el valor del id del profesor que se loguea-->
	<form name="form" method="post">
	<?php echo '<input class="bids" type="hidden" name="prof" id="prof" value="'.$id_profesor.'">'; ?>
	<?php echo '<input class="bids" type="hidden" name="mat" id="mat" value="'.$n_materia.'">'; ?>
	<label>Titulo: </label>
	<input type="text" id="titulo" ></input>
	<label>Anuncio: </label>
	<textarea id="anuncio"  maxlength="250"></textarea>
	<label>Fecha: </label>
	<?php date_default_timezone_set('UTC');
		echo '<input type="text" disabled="disabled" name="actual" id="actual" value='.date("Y-m-d").'>';?>
	<label> Fecha de entrega: </label>
	<input type="text" disabled="disabled" name="ingreso" id="ingreso" value="Y-m-d" /> 
	<img src="../imgs/calendario.png" width="16" height="16" border="0" title="Fecha Inicial" id="lanzador">
	<!-- script que define y configura el calendario--> 
	<script type="text/javascript"> 
	   Calendar.setup({ 
	    inputField     :    "ingreso",     // id del campo de texto 
	     ifFormat     :     "%Y-%m-%d",     // formato de la fecha que se escriba en el campo de texto 
	     button     :    "lanzador"     // el id del botón que lanzará el calendario 
	}); 
	</script>

	<button type="button" class="pill orange" onclick="javascript:ingresar_anuncio();"><i class="icon-plus-sign">Agregar</i></button>
	<hr>
	</form>


	<!--formulario para eliminar los anuncios-->
	<br>
	<?php
		$consulta = "select * from anuncios";
		$res = mysqli_query($conexion,$consulta);
	?>
	<table class="tablestyle" cellspacing="0" cellpadding="0" style="max-width='100px'">
	<thead>
		<tr>
			<th>Titulo</th>
			<th>Anuncio</th>
			<th>Fecha de entraga</th>
			<th>Acción</th>
		</tr>
	</thead>
		<?php
			$i = 0;
			while ($rsAnu = mysqli_fetch_array($res))
			 {
		?>
		<tr>
		<td>

			<form name="formAn<?php echo $i ?>" method="post">
			<?php
			echo '<input type="text" name="titulo2" id="titulo2" value='.$rsAnu['titulo'].'>';?> </td>
			<td><?php echo'<textarea id="anuncio2" name="anuncio2"  maxlength="250">'.$rsAnu['anuncio'].'</textarea>';?></td>
				<td> <?php echo'<input type="text" name="ingreso2" id="ingreso2" value='.$rsAnu['fecha_entrega'].'>' ; ?></td>
				 <td><?php echo '<input class="bids" type="hidden" name="an_id" id="an_id" value='.$rsAnu['id'].'>';?>
				 <?php echo'<button type="button" class="pill orange" onclick="javascript:modificar_anuncio('.$i.');" >
				<i class="icon-plus-sign">Modificar</i></button>
				<button type="button" class="pill orange" onclick="javascript:eliminar_anuncio('.$i.');">
				<i class="icon-minus-sign">Eliminar</i></button>'; $i ++;
			?></td>
			</form>
		</td>
		</tr>
		<?php  }
	}
}
	?>
</table>
<?php include("../includes/footer.php");?>
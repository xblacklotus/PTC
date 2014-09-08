<?php include("../includes/inheader.php");?>
<script type="text/javascript" src="../js/funciones.js"></script>

<form name="forming" method="post" >
<label>Nombres</label>
<input type="text" id="nombre_maestro"></input>
<label>Apellidos</label>
<input type="text" id="apellido_maestro"></input>
<label>#Usuario</label>
<input type="text" id="usuario"></input>
<button type="button" class="pill orange" onclick="javascript:ingresar_maestro();" ><i class="icon-plus-sign">Ingresar</i></button>          
</form>
<div id="divprueba"></div>

<?php
			$consulta = "select * from profesor";
			$res = mysqli_query($conexion,$consulta);
			
			
		?>
		<table>
			<th></th>
			<?php $i = 0; 
				while ($rsSecc = mysqli_fetch_array($res)) { 
			?>
	
			<tr>
			
				<td>
				<form name="formMo" method="post">
				<?php echo '<input type="text" id="nombre2" placeholder="'.$rsSecc['nombres'].'"></input> 
				<input type="text" id="apellido2" placeholder="'.$rsSecc['apellidos'].'"></input> 
				<input type="text" id= "id_usuario2" placeholder="'.$rsSecc['id_usuario'].'"></input> 
				<input class="bids" type="hidden" name="id_ma" value='.$rsSecc['id'].'> </input>
				<button type="button" class="pill orange" onclick="javascript:modificar_maestro('.$i.');" >
				<i class="icon-plus-sign">Modificar</i></button>
				<button type="button" class="pill orange" onclick="javascript:eliminar_maestro('.$i.');">
				<i class="icon-minus-sign">Eliminar</i></button>'; $i ++;?> 
				</form>
				</td>
				
			</tr>
			
			<?php  }?>
		</table>


<?php include("../includes/footer.php");?>
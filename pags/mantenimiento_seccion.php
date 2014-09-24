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

<!--Formulario para ingresar una sección-->
<form name="form" method="post" >
<label>Nombre de sección</label>
<input type="text" id="nombre_seccion"></input>
<button type="button" class="pill orange" onclick="javascript:ingresar_seccion();" ><i class="icon-plus-sign">Ingresar</i></button>          
</form>
<div id="divprueba"></div>


<!--Formulario para modificar y eleiminar una sección-->
		<?php
			$consulta = "select * from seccion";
			$res = mysqli_query($conexion,$consulta);			
		?>
		<table class="tablestyle">
		<tbody>
		<tr class="tablehead">
			<th>Secciones</th>
			<th>Accion</th>
		</tr>
			
			<?php $i = 0; 
				while ($rsSecc = mysqli_fetch_array($res)) { 
			?>
	
			<tr>
			
				<td>
				<form name="formMo<?php echo $i ?>" method="post">
				<?php echo '<input type="text" id="new_se" value="'.$rsSecc['nombre'].'"></input> ';?></td>
				<td><?php echo'<input class="bids" type="hidden" name="se_id" value='.$rsSecc['id'].'> 
				<button type="button" class="pill orange" onclick="javascript:modificar_seccion('.$i.');" >
				<i class="icon-plus-sign">Modificar</i></button>
				<button type="button" class="pill orange" onclick="javascript:eliminar_seccion('.$i.');">
				<i class="icon-minus-sign">Eliminar</i></button>'; $i ++;?> 
				</form>
				</td>
				
			</tr>
			
			<?php  }?>
			</tbody>
		</table>





<?php include("../includes/footer.php");}?>
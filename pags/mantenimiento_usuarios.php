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

<form name="formIng" method="post">
<label>contraseña de usuario</label>
<input type="password" id="contra_usu"></input>
<label>confirmar contraseña :</label>
<input type="password" id="contra_rea"></input>
<button type="button" class="pill orange" onclick="javascript:ingresar_usuario();"><i class="icon-plus-sign">Ingresar</i></button>
</form>
<?php
			$consulta = "select * from usuario";
			$res = mysqli_query($conexion,$consulta);
			
			
		?>
		<table>
			<th></th>
			<?php $i = 0; 
				while ($rsSecc = mysqli_fetch_array($res)) { 
			?>
	
			<tr>
			
				<td>
				<form name="formMo<?php echo $i ?>" method="post">
				<?php echo '<input type="text" id="contra" placeholder="'.$rsSecc['contraseña'].'"></input> 
				<input class="bids" type="hidden" name="id_usuario" value='.$rsSecc['id'].'> </input>
				<button type="button" class="pill orange" onclick="javascript:modificar_usuario('.$i.');" >
				<i class="icon-plus-sign">Modificar</i></button>
				<button type="button" class="pill orange" onclick="javascript:eliminar_usuario('.$i.');">
				<i class="icon-minus-sign">Eliminar</i></button>'; $i ++;?> 
				</form>
				</td>
				
			</tr>
			
			<?php  }?>
		</table>


<?php include("../includes/footer.php");}?>

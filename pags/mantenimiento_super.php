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
<br>
<form name="formIng" method="post">
<label>Usuario</label>
<input type="text" id="nombre" name="nombre"></input>
<label>contraseña de usuario</label>
<input type="password" id="contra_usu"></input>
<label>confirmar contraseña :</label>
<input type="password" id="contra_rea"></input>
<button type="button" class="pill orange" onclick="javascript:ingresar_super();"><i class="icon-plus-sign">Ingresar</i></button>
</form>
<?php
			$consulta = "select * from super_usuario";
			$res = mysqli_query($conexion,$consulta);
			
			
		?>
		<hr>
		<table class="tablestyle">
		<tbody>
			<tr class="tablehead">
			<th>usuario</th>
        <th>Contraseña</th>
        <th>Accion</th>
        
    	</tr>
			<?php $i = 0; 
				while ($rsSecc = mysqli_fetch_array($res)) { 
			?>
	
			<tr>
			
				<td>
				<form name="formMo<?php echo $i ?>" method="post">
				<?php echo '<input type="text" id="nombre2" name="nombre2" value="'.$rsSecc['usuario'].'"/>'?></td>
				<td><?php echo'<input type="text" id="contra" value="'.$rsSecc['contra'].'"></input> ';?></td>
				<td><?php echo'
				<button type="button" class="pill orange" onclick="javascript:modificar_super('.$i.');" >
				<i class="icon-plus-sign">Modificar</i></button>
				<button type="button" class="pill orange" onclick="javascript:eliminar_super('.$i.');">
				<i class="icon-minus-sign">Eliminar</i></button>'; $i ++;?> 
				</form>
				</td>
				
			</tr>
			
			<?php  }?>
			</tbody>
		</table>


<?php include("../includes/footer.php");}?>

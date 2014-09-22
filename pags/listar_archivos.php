<?php 
session_start();
//Validar si se está ingresando con sesión correctamente
if (!isset($_SESSION['userp'])){
echo '<script language = javascript>
alert("Sesion invalida");
self.location = "loginMaestro.php";
</script>';
}
else
{
include("../includes/inheader.php");?>


<script type="text/javascript" src="../js/funciones.js"></script>
<?php
if($_POST) {
        $id=$_POST['m_id'];
        echo '<div  class="tab-content">';
        echo "<h1>Agregar Archivo:</h1>
        <form enctype='multipart/form-data' action='../includes/guardar_archivo.php' method='post'>
Descripción <input type='text' name='titulo' size='30'>
 <input class='bids' type='hidden' name='id' value='".$id."''>
<br> <input  type='file' name='archivito' >
<br><input type='submit' value='Enviar archivo'>
</form><br><br>";

    $qry = "SELECT id, nombre, titulo, size tipo FROM archivos where id_materia='".$id."'";
    //$res = mysql_query($qry);
    $resul=mysqli_query($conexion,$qry);
    /*while($fila = mysqli_fetch_array($resul))
    {
        echo "$fila[titulo]
        <br>
        $fila[nombre] ($fila[tipo])
        <br>
        <a href='descargar_archivo.php?id=$fila[id]'>Descargar</a>
        <br>
        <br>";
    }*/
    
    echo '<!-- Table --><table id="tbmats" class="striped tight sortable" 
              cellspacing="0" cellpadding="0" style="max-width="500px">
            <thead><tr>
                
                <th>Nombre del archivo</th>
                <th >Descripcion</th>
                <th max-width="100px">Peso(MB)</th>  
                <th max-width="50px">Accion</th>            
            </tr></thead>
            <tbody>';
    $i=0;
    while($fila=mysqli_fetch_array($resul))
            {
                echo '<tr>
                        <form name="formArch'.$i.'" method="post" action="descargar_archivo.php" >

                        <td> '.$fila[1].'</td>
                        <td> '.$fila[2].'</td> 
                        <td> '.$fila[3].'</td> 
                       <td>
                       <input class="bids" type="hidden" name="id" value='.$fila[0].'> </input> <button type="submit" class="pill orange"   >
                       <i class="icon-plus-sign">Descargar</i></button>
                       <button type="button" class="pill orange"  name="ver_notas" id="ver_notas" onclick="javascript:eliminarArch('.$i.');">Eliminar</button></td> 

                        </form>                   
                     </tr>';
                     $i++; 
            }
                 echo '</table>';
                 echo '</div>';
    }
}
?>




<?php include("../includes/footer.php");?>          
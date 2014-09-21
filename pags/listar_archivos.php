<script type="text/javascript" src="../js/funciones.js"></script>
<?php include("../includes/inheader.php");?>
<?php
$id_materia=1;


$qry = "SELECT id, nombre, titulo, size tipo FROM archivos where id_materia='".$id_materia."'";
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
echo '<div  class="tab-content">';
echo '<!-- Table --><table id="tbmats" class="striped tight" 
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
                   <i class="icon-plus-sign">Descargar</i></button></td> 
                    </form>                   
                 </tr>';
                 $i++; 
        }
             echo '</table>';
             echo '</div>';

?>


<?php include("../includes/footer.php");?>          
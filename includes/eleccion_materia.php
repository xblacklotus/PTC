<script type="text/javascript" src="../js/funciones.js"></script>
<?php 
  

    
   $peticion2="select nombres,apellidos FROM profesor WHERE id=".$id_profe;   
        $resultado2=mysqli_query($conexion,$peticion2);
                date_default_timezone_set('America/El_Salvador');
        if($fila2=mysqli_fetch_array($resultado2))
        {
            echo '<h2>'.$fila2[0].' '.$fila2[1].' &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.date("d-m-y").'</h2>';
        }
    $peticion="select m.nombre,m.grado,s.nombre,m.id,s.id from profesor as p,materias as m,seccion as s 
               where p.id=id_profesor and id_seccion=s.id and p.id=".$id_profe;
    echo '<!-- Table --> <table id="tbmats" class="striped tight sortable" cellspacing="0" cellpadding="0" style="max-width="100px">
    <thead><tr>
        <th>Materia</th>
        <th>Grado</th>
        <th>Sección</th>
        <th>Acción</th>
    </tr></thead>
    <tbody>';
    $resultado=mysqli_query($conexion,$peticion);  
    $i=0;   
    while($fila=mysqli_fetch_array($resultado))
    {
        echo '<tr>
            <td>'.$fila[0].'</td>';

        echo '<td>'.$fila[1].'</td>';
        echo '<td>'.$fila[2].'</td>';
        
        echo '<td><form name="form'.$i.'" method="post" action="perfiles.php">    
        <input class="bids" type="text" name="grado" value='.$fila[1].'>                                 
                                 <input class="bids red" type="text" name="m_id" value='.$fila[3].'>                                  
                                 <input class="bids" type="text" name="s_id" value='.$fila[4].'>
                                 <input class="bids" type="text" name="id_profe" value='.$id_profe.'>
        <button type="submit" class="pill orange"  name="ele_perf" ><i>Elegir perfil</i></button>
         <button type="submit" class="pill orange"  name="ver_notas" id="ver_notas" onclick="javascript:notasMateria('.$i.');">Ver notas</button>
         <button type="submit" class="pill orange"  name="ver_arch" id="archivos" onclick="javascript:ver_archivos('.$i.');">Ver Archivos</button>
          </form></td> </tr>';  
          $i++ ;        
          //document.formulario.action= "hola.php";
    }               
    //<input class="bids" type="hidden" name="grado" value='.$fila[4].'>
    //<input class="bids" type="hidden" name="s_id" value='.$fila[1].'>
    echo '</tbody></table>';
?>
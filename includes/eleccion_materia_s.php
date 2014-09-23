<script type="text/javascript" src="../js/funciones.js"></script>
<?php 
    echo "<form method='POST' action='notas_s.php'><input type='text' id='id_alumno' name='id_alumno' placeholder='Id alumno'>
    <button class='orange pill' type='submit'>Buscar</button>
    </form><br>";
    echo "<h3>".$id_profe."</h3>";
    echo '<h2>'.date("d-m-y").'</h2>';
        
    $peticion="select m.nombre,m.grado,s.nombre,m.id,s.id from profesor as p,materias as m,seccion as s 
               where p.id=id_profesor and id_seccion=s.id ";
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
        
        echo '<td><form name="form'.$i.'" method="post" action="mantenimientos.php">    
        <input class="bids" type="text" name="grado" value='.$fila[1].'>                                 
                                 <input class="bids red" type="text" name="m_id" value='.$fila[3].'>                                  
                                 <input class="bids" type="text" name="s_id" value='.$fila[4].'>
                                 <input class="bids" type="text" name="id_profe" value=1>
        <button type="submit" class="pill orange"  name="ele_perf" ><i>Elegir perfil</i></button>
         <button type="submit" class="pill orange"  name="ver_notas" id="ver_notas" onclick="javascript:s_notasMateria('.$i.');">Ver notas</button>
          </form></td> </tr>';  
          $i++ ;        
          //document.formulario.action= "hola.php";
    }               
    //<input class="bids" type="hidden" name="grado" value='.$fila[4].'>
    //<input class="bids" type="hidden" name="s_id" value='.$fila[1].'>
    echo '</tbody></table>';
?>
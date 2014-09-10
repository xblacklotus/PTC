<script type="text/javascript" src="../js/funciones.js"></script>

<?php     
     if($_POST) 
     {
        $m_id=$_POST['m_id'];
        $s_id=$_POST['s_id'];
        $grado=$_POST['grado'];
        $id_profe=$_POST['id_profe'];
        $peticion="select m.nombre,p.descripcion,p.porcentaje,p.trimestre,p.id from perfiles as p, materias as m,seccion as s 
                    where id_materia=".$m_id." and m.id=".$m_id." and s.id=".$s_id;
        
        $peticion1="select m.nombre where m.id=".$m_id;        
        $resultado1=mysqli_query($conexion,$peticion);    
                
        if($fila1=mysqli_fetch_array($resultado1))
        {
            echo '<h2>Materia : '.$fila1[0].'</h2>';
        }

        echo '<h4>Eliga el perfil</h4>';
        echo '<!-- Table --> <table id="tbmats" class="striped tight sortable" 
              cellspacing="0" cellpadding="0" style="max-width="100px">
        <thead><tr >
            
            <th>Descripcion</th>
            <th>Porcentaje</th>
            <th>Trimestre</th>
            <th>Acción</th>
        </tr></thead>
        <tbody>';        
        $resultado=mysqli_query($conexion,$peticion);    
        $i=0;        
        while($fila=mysqli_fetch_array($resultado))
        {
            
            echo '<tr>';                
            echo '<td>'.$fila[1].'</td>';
            echo '<td>'.$fila[2].'</td>';
            echo '<td>'.$fila[3].'</td>';  
            
            echo '<td><form name="from'.$i.'" method="post" action="ingresar_notas.php">
                                     <input class="bids" type="hidden" name="p_id" id="p_id" value='.$fila[4].'>
                                     <input class="bids" type="hidden" name="m_id" value='.$m_id.'>
                                     <input class="bids" type="hidden" name="s_id" value='.$s_id.'>
                                     <input class="bids" type="hidden" name="grado" value='.$grado.'>
                                     <input class="bids" type="hidden" name="id_profe" value='.$id_profe.'>
                                     <input class="bids" type="hidden" name="recargada" value="false">   
            <button type="submit" class="pill orange"  name="in_notas" ><i>Ingresar</i></button>            
            <button type="button" class="pill orange"  name="ver_notas" id="ver_notas" onclick="javascript:verNotas('.$i.');">Ver</button>
            <button type="button" class="pill orange" name="botoneliminar" onclick="javascript:enviar('.$i.');" ><i class="icon-minus-sign">Eliminar</i></button>            
              </form></td> </tr>';
              $i++;
        };
        
        echo '</tbody></table>';            
     }    
?>

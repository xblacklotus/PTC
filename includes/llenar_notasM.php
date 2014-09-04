<?php
if($_POST)
{
    var_dump($_POST);
    $m_id=$_POST['m_id'];
    $s_id=$_POST['s_id'];
    $grado=$_POST['grado'];
    $id_profe=$_POST['id_profe'];
    $p_id=$_POST['p_id'];

    $notas = array();

    if (isset($_POST['cantidad'])) 
    {
        $cantidad=$_POST['cantidad'];
        for ($i=0; $i <$cantidad ; $i++) 
        { 
            $notas[$i]=$_POST['nota'.$i];
        }    
    }
    
    $peticion="select a.nombres,a.apellidos,m.grado,m.id,a.id_seccion,p.trimestre, a.id, np.notas
from materias as m,perfiles as p, alumno as a, seccion as s, notas_perfiles np
where a.id_seccion=m.id_seccion
and s.id=".$s_id."
and a.grado=".$grado."
and p.id=".$p_id."
and m.id_seccion=s.id
and a.grado=m.grado
and m.id=p.id_materia";
    echo '<!-- Table --><table id="tbmats" class="striped tight" 
          cellspacing="0" cellpadding="0" style="max-width="100px">
    <thead><tr>
        <th>Alumno</th>
        <th max-width="100px">Notas</th>
    </tr></thead>
    <tbody>';
    $resultado=mysqli_query($conexion,$peticion);    
    $cantidad=0;    
    while($fila=mysqli_fetch_array($resultado))
    {
            echo '<tr>
            <td> '.$fila[1].' ,'.$fila[0].'</td>';
            if(isset($_POST['cantidad']))
            {
                echo '<td class="textos"><input type="text" form="notas" 
             name="nota'.$cantidad.'"" value="'.$notas[$cantidad].'"></td></tr>';
            }
            else
            {
                echo '<td class="textos"><input type="text" form="notas" 
             name="nota'.$cantidad.'" id="nota'.$cantidad.'" id value=""></td></tr>';
            }        

            echo '<input class="bids" type="hidden" form="notas"name="a_id'.$cantidad.'" value='.$fila[6].'> ';        
        $cantidad++;        
    }
    echo '</tbody></table>
    <form name="notas" id="notas" method="post" onsubmit="return ingresar();" action="guardar_notas.php">
        <input class="bids" type="hidden" name="p_id" value='.$p_id.'>        
        <input class="bids" type="hidden" name="cantidad" id="cantidad" value='.$cantidad.'>        
         <input class="bids" type="hidden" name="m_id" value='.$m_id.'>
         <input class="bids" type="hidden" name="s_id" value='.$s_id.'>
         <input class="bids" type="hidden" name="grado" value='.$grado.'>
         <input class="bids" type="hidden" name="id_profe" value='.$id_profe.'>         
        <button type="submit"class="orange spill" name="guardar_notas">Modificar notas</button>
        </form>';
}
?>
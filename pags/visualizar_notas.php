<?php include("../includes/inheader.php");?>

<script type="text/javascript" src="../js/funciones.js"></script>
<?php
    $m_id=$_POST['m_id'];
    $s_id=$_POST['s_id'];
    $grado=$_POST['grado'];
    $id_profe=$_POST['id_profe'];
    $p_id=$_POST['p_id'];    
    $peticion="select a.id,a.nombres,a.apellidos,np.nota,m.grado,s.nombre,m.nombre,p.trimestre, np.id
from materias as m,perfiles as p, alumno as a, seccion as s,notas_perfiles as np
    where a.id_seccion=m.id_seccion
    and s.id=".$s_id."
    and a.grado=".$grado."
    and p.id=".$p_id."
    and m.id_seccion=s.id
    and np.id_alumno=a.id
    and np.id_perfil=p.id
    and a.grado=m.grado
    and m.id=p.id_materia";
    $resultado=mysqli_query($conexion,$peticion);
    if($resultado)
    {
        echo '<!-- Table --><table id="tbmats" class="striped tight" 
          cellspacing="0" cellpadding="0" style="max-width="500px">
        <thead><tr>
            <th max-width="100px">ID</th>
            <th>Alumno</th>
            <th max-width="100px">Nota</th>  
            <th max-width="50px">Accion</th>            
        </tr></thead>
        <tbody>';
        $resultado=mysqli_query($conexion,$peticion);    
        $cantidad=0;    
        $i=0;
        while($fila=mysqli_fetch_array($resultado))
        {
            echo '<tr>
                    <form name="formNots'.$i.'" method="post">

                    <td> '.$fila[0].'</td>
                    <td> '.$fila[2].' ,'.$fila[1].'</td>
                    <td> <input type="text" id="nota" value="'.$fila[3].'"></input> </td> 
                   <td>
                   <input class="bids" type="hidden" name="id" value='.$fila[8].'> </input> <button type="button" class="pill orange"  onclick="javascript:modificar_nota('.$i.');" >
                   <i class="icon-plus-sign">Modificar</i></button></td> 
                    </form>                   
                 </tr>';
                 $i++; 
        }
             echo '</table>';
    }
    else
    {
        echo "Hubo un error a la hora de obtener las notas";
    }
?>
<?php include("../includes/footer.php");?>
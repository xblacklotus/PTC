<?php include("../includes/config.inc");

	
    $m_id=$_POST['m_id'];
    $s_id=$_POST['s_id'];
    $grado=$_POST['grado'];
    $id_profe=$_POST['id_profe'];
    $p_id=$_POST['p_id'];
    
    $peticion="select a.id,a.nombres,a.apellidos,np.nota,m.grado,s.nombre,m.nombre,p.trimestre
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
        while($fila=mysqli_fetch_array($resultado))
        {
           
        }
    }
    else
    {
        echo "Hubo un error";
    }
?>
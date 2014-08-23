<?php     
     if($_POST) 
     {        
      var_dump($_POST);
        $m_id=$_POST['m_id'];
        $s_id=$_POST['s_id'];
        $grado=$_POST['grado'];
        $id_profe=$_POST['id_profe'];
        $peticion="select m.nombre,p.descripcion,p.porcentaje,p.trimestre,p.id from perfiles as p, materias as m,seccion as s 
                    where id_materia=".$m_id." and m.id=".$m_id." and s.id=".$s_id;
        echo '<h2>Eliga el perfil</h2>';
        echo '<!-- Table --> <table id="tbmats" class="striped tight" 
              cellspacing="0" cellpadding="0" style="max-width="100px">
        <thead><tr >
            <th>Materia</th>
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
            
            echo '<tr>
                <td>'.$fila[0].'</td>';
            echo '<td>'.$fila[1].'</td>';
            echo '<td>'.$fila[2].'</td>';
            echo '<td>'.$fila[3].'</td>';        
            echo '<td><form name="from'.$i.'" method="post" action="ingresar_notas.php">                                                              
                                     <input class="bids" type="hidden" name="p_id" id="p_id" value='.$fila[4].'>
                                     <input class="bids" type="hidden" name="m_id" value='.$m_id.'>
                                     <input class="bids" type="hidden" name="s_id" value='.$s_id.'>
                                     <input class="bids" type="hidden" name="grado" value='.$grado.'>
                                     <input class="bids" type="hidden" name="id_profe" value='.$id_profe.'>
                                     <input class="bids" type="hidden" name="form'.$i.'" value='.$i.'>
                                     <input class="bids" type="hidden" name="recargada" value="false">   
            <button type="submit" class="pill orange"  name="in_notas" ><i>Ingresar notas</i></button>            
            <input type="button" name="botoneliminar" onclick="asa('.$i.');">
              </form></td> </tr>';          
              $i++;
        };
        echo '</tbody></table>'; 
        echo '<input type="text" id="prueba"/>';       
     }    
?>

  <script type="text/javascript">
function asa(name)
{    
    //var form=getElementById(name);
    var oForm1 = document.forms['from0'];
    alert("hola");
    var oForm1Element = oForm1['p_id'];
        alert("holas");
    
    var form = document.forms[0].elements(0).value;
    alert(form);
    var preguntatexto = form.getElementById('p_id').value;// document.getElementById("p_id").value;
    alert(preguntatexto);
}
/*$('#botoneliminar').click(function (){
     alert("hola");
    $.ajax({/*
    type: "POST",
    url:"eliminarPer.php",
    data: 'strTexto='+preguntatexto,
    success: function(resp){  
      if (resp==1)
       $("#exito1").show("slow");
       document.formfrecuente.strTexto.value="";
       alert("hola");
      }
    });
});*/


</script>
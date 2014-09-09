<?php include("../includes/inheader.php");
    $id_alumno=1;
?>
<br>
<div  class="tab-content">
<?php
//Bloque de grado
    $peticion="select grado from alumno where id=".$id_alumno."" ;
    $resultado=mysqli_query($conexion,$peticion);
    $fila=mysqli_fetch_array($resultado);
    $grado = $fila[0];
   // echo 'grado: '.$grado;
?>
<?php
//Bloque de seccion
    $peticion2="select id_seccion from alumno where id=".$id_alumno."" ;
    $resultado2=mysqli_query($conexion,$peticion2);
    $fila2=mysqli_fetch_array($resultado2);
    $seccion = $fila2[0];
   // echo 'seccion: '.$seccion;
?>
 <?php
  //Creamos los parametros iniciales
  $filas=0;
  $columnas = 4;
  $texto = 0;
  $enca=array('Numero','Descripcion','Porcentaje','Nota');
  ?>   
<?php
    $peticion3="select count(*) from materias where grado=".$grado." and id_seccion=".$seccion."" ;
    $resultado3=mysqli_query($conexion,$peticion3);
    $fila3=mysqli_fetch_array($resultado3);
    $materias = $fila3[0]; 
    //echo 'materias: '.$materias;
?>
<?php
    $peticion4="select * from materias where grado=".$grado." and id_seccion=".$seccion."" ;
    $resultado4=mysqli_query($conexion,$peticion4);
    //$fila4=mysqli_fetch_array($resultado4)
    $a=0;
    $numero=1;
    while ($fila4=mysqli_fetch_array($resultado4)) {
      $total=0;
       echo "<h5>".$fila4[1]."</h5>";
        echo '<table  class="striped tight sortable" 
          cellspacing="1" cellpadding="0" style="max-width="200px">';
        $peticion5="select * from perfiles where id_materia=".$fila4[0];
        $resultado5=mysqli_query($conexion,$peticion5);
        //$fila5=mysqli_fetch_array($resultado5);
                 echo "<thead>";
         echo "<th style=padding:3px;>".$enca[0]."</th>";
         echo "<th style=padding:3px;>".$enca[1]."</th>";
         echo "<th style=padding:3px;>".$enca[2]."</th>";
         echo "<th style=padding:3px;>".$enca[3]."</th></thead>";
        while ($fila5=mysqli_fetch_array($resultado5)) {
            # code...
          $peticion6="select nota from notas_perfiles where id_perfil=".$fila5[0]." and id_alumno=".$id_alumno."";
          $resultado6=mysqli_query($conexion,$peticion6);
          $fila6=mysqli_fetch_array($resultado6);
          $nota_per = $fila6[0];
            $t=1;
          echo "<tr>";
          //Iniciamos el bucle de las filas tr=table row
          for($y=0;$y<$columnas;$y++){
            if ($y==0) {
              echo "<td style=padding:3px;>".$numero."</td>";
              $numero++;
            }
            elseif ($y==($columnas-1)) {
              echo "<td style=padding:3px;>".$nota_per."</td>";
            }
            else{
              echo "<td style=padding:3px;>".$fila5[$t]."</td>";                
                $t++;
            }
                
           }
           $total=(($nota_per*$fila5[2])/100)+$total;
           
           //Cerramos columna
           echo "</tr>";
          }
          echo "<tr>";
          echo "<td style=padding:3px;>"."<strong>Nota Final</strong>"."</td>";
         echo "<td style=padding:3px;>".$total."</td>";
          echo "</tr>";

         $numero=1;
         echo "</table>";
    }


?>
  
  </div>
<!-- Creamos el inicio de la tabla manualmente-->
<?php include("../includes/footer.php");?>





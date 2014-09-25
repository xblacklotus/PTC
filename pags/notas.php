<?php 


session_start();
//Validar si se está ingresando con sesión correctamente
$imprimir=false;
if (!$_SESSION){
echo '<script language = javascript>
alert("Sesion invalida");
self.location = "loginAlumno.php";
</script>';
}
else
{
if(isset($_SESSION['userp']))
{
  include("../includes/inheader.php");
  if(isset($_POST['id_alumno']))
  {
    if ($_POST['id_alumno']>=1)
    {
      $imprimir=true;
      $id_alumno=$_POST['id_alumno'];
    }
    else
      echo '<script language = javascript>
  alert("Id invalido'.$id_alumno.'");
  self.location = "loginMaestro.php";
  </script>';
  }
  else
    echo '<script language = javascript>
  alert("Id invalido");
  self.location = "loginMaestro.php";
  </script>'; 
}
else{
  include("../includes/header_al.php");
  $id_alumno=$_SESSION['user'];
  $imprimir=true;
}


    
?>
<br>
<div  class="tab-content">
<?php
//Bloque de grado
if($imprimir)
{  
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
    
    if($resultado3)
    {
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
    echo '<ul class="tabs left">
      <li><a href="#ta1">Prier Trimestre</a></li>
      <li><a href="#ta2">Segundo Trimestre</a></li>
      <li><a href="#ta3">Tercer Trimestre</a></li>

      </ul><div id="ta1" class="tab-content">';



    while ($fila4=mysqli_fetch_array($resultado4)) {
      $total=0;
       echo "<h5>".$fila4[1]."</h5>";
        echo '<table  class="striped tight sortable" 
          cellspacing="1" cellpadding="0" style="max-width="200px">';
        $peticion5="select * from perfiles where id_materia=".$fila4[0]." and trimestre='1'";
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
    echo '</div>';



    $peticion41="select * from materias where grado=".$grado." and id_seccion=".$seccion."" ;
    $resultado41=mysqli_query($conexion,$peticion41);
    //$fila4=mysqli_fetch_array($resultado4)
    $a=0;
    $numero=1;
    echo '<div id="ta2" class="tab-content">';
    while ($fila41=mysqli_fetch_array($resultado41)) {
      $total=0;
       echo "<h5>".$fila41[1]."</h5>";
        echo '<table  class="striped tight sortable" 
          cellspacing="1" cellpadding="0" style="max-width="200px">';
        $peticion51="select * from perfiles where id_materia=".$fila41[0]." and trimestre='2'";
        $resultado51=mysqli_query($conexion,$peticion51);
        //$fila5=mysqli_fetch_array($resultado5);
                 echo "<thead>";
         echo "<th style=padding:3px;>".$enca[0]."</th>";
         echo "<th style=padding:3px;>".$enca[1]."</th>";
         echo "<th style=padding:3px;>".$enca[2]."</th>";
         echo "<th style=padding:3px;>".$enca[3]."</th></thead>";
        while ($fila51=mysqli_fetch_array($resultado51)) {
            # code...
          $peticion61="select nota from notas_perfiles where id_perfil=".$fila51[0]." and id_alumno=".$id_alumno."";
          $resultado61=mysqli_query($conexion,$peticion61);
          $fila61=mysqli_fetch_array($resultado61);
          $nota_per = $fila61[0];
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
              echo "<td style=padding:3px;>".$fila51[$t]."</td>";                
                $t++;
            }
                
           }
           $total=(($nota_per*$fila51[2])/100)+$total;
           
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
    echo '</div>';




    $peticion42="select * from materias where grado=".$grado." and id_seccion=".$seccion."" ;
    $resultado42=mysqli_query($conexion,$peticion42);
    //$fila4=mysqli_fetch_array($resultado4)
    $a=0;
    $numero=1;
    echo '<div id="ta3" class="tab-content">';
    while ($fila42=mysqli_fetch_array($resultado42)) {
      $total=0;
       echo "<h5>".$fila42[1]."</h5>";
        echo '<table  class="striped tight sortable" 
          cellspacing="1" cellpadding="0" style="max-width="200px">';
        $peticion52="select * from perfiles where id_materia=".$fila42[0]." and trimestre='3'";
        $resultado52=mysqli_query($conexion,$peticion52);
        //$fila5=mysqli_fetch_array($resultado5);
                 echo "<thead>";
         echo "<th style=padding:3px;>".$enca[0]."</th>";
         echo "<th style=padding:3px;>".$enca[1]."</th>";
         echo "<th style=padding:3px;>".$enca[2]."</th>";
         echo "<th style=padding:3px;>".$enca[3]."</th></thead>";
        while ($fila52=mysqli_fetch_array($resultado52)) {
            # code...
          $peticion62="select nota from notas_perfiles where id_perfil=".$fila52[0]." and id_alumno=".$id_alumno."";
          $resultado62=mysqli_query($conexion,$peticion61);
          $fila62=mysqli_fetch_array($resultado62);
          $nota_per = $fila62[0];
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
              echo "<td style=padding:3px;>".$fila52[$t]."</td>";                
                $t++;
            }
                
           }
           $total=(($nota_per*$fila52[2])/100)+$total;
           
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
    echo '</div>';



?>
  
  </div>
<!-- Creamos el inicio de la tabla manualmente-->
<?php include("../includes/footer.php");
}else{
  echo "<h3>Alumno no existente</h3>";
}
}}?>




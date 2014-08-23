<?php include("../includes/inheader.inc");
    $id_alumno=3;
?>

<?php
//Bloque de grado
    $peticion="select grado from alumno where id=".$id_alumno."" ;
    $resultado=mysqli_query($conexion,$peticion);
    $fila=mysqli_fetch_array($resultado);
    $grado = $fila[0];
?>
<?php
//Bloque de seccion
    $peticion2="select id_seccion from alumno where id=".$id_alumno."" ;
    $resultado2=mysqli_query($conexion,$peticion2);
    $fila2=mysqli_fetch_array($resultado2);
    $seccion = $fila2[0];
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
?>
<?php
    $peticion4="select * from materias where grado=".$grado." and id_seccion=".$seccion."" ;
    $resultado4=mysqli_query($conexion,$peticion4);
    //$fila4=mysqli_fetch_array($resultado4)
    while ($fila4=mysqli_fetch_array($resultado4)) {
        echo $fila4[1];
        echo "<table border='1'>";
        $peticion5="select count(*) from perfiles where id_materia=".$fila4[0]."";
        $resultado5=mysqli_query($conexion,$peticion5);
        $fila5=mysqli_fetch_array($resultado5);
        $num_filas = $fila5[0]+1;
        for($t=0;$t<$num_filas;$t++){
          echo "<tr>";
          //Iniciamos el bucle de las columnas
          for($y=0;$y<$columnas;$y++){
            if ($t==0) {
                echo "<td style=padding:3px;>".$enca[$y]."</td>";
            }
            else{
                echo "<td style=padding:3px;>".$texto."</td>";
                $texto++;
            }
           }
           //Cerramos columna
           echo "</tr>";
          }
         
         echo "</table>";
    }

?>
<!-- Creamos el inicio de la tabla manualmente-->
<?php include("../includes/footer.inc");?>
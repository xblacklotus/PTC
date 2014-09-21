<?php 
include("../includes/inheader.php");?>
<script type="text/javascript" src="../js/funciones.js"></script>
<?php 
if($_POST) 
     {
        //SELECT nombres, apellidos FROM alumno WHERE id_seccion=1 and grado=7
      $apro=0;
      $repro=0;
        echo "<div  class='tab-content'>";
         $a=$_POST['m_id'];
         $b=$_POST['s_id'];
         $c=$_POST['grado'];
        $peticion="select * from perfiles where id_materia=".$a;
        $resultado=mysqli_query($conexion,$peticion);

        $peticion2="select id, nombres, apellidos from alumno where id_seccion=".$b." and grado=".$c."";
        $resultado2=mysqli_query($conexion,$peticion2);
        echo '<table  class="striped tight sortable" 
          cellspacing="1" cellpadding="0" style="max-width="200px">';
          echo "<thead>";
          echo "<th style=padding:3px;>Alumno</th>";
          
          $titulos=array();
          array_push($titulos,"Alumno");
          $cantidad_perfiles=0;
          while ($fila5=mysqli_fetch_array($resultado)){
            $cantidad_perfiles++;
            array_push($titulos, $fila5[1]."(".$fila5[2]."%)");

            echo "<th style=padding:3px;text-align:center;>".$fila5[1]."(".$fila5[2]."%)"."</th>";
          }
          array_push($titulos,"Promedio");
          echo "<th style=padding:3px;>Promedio</th>";         

       $nombres=array();
       $perfiles=array();
       $filaperfil=array();
       $numperfil=0;
       $promedios=array();
       $filasi=0;
       $numperfil=0;
        while($fila2=mysqli_fetch_array($resultado2))
        {
            echo "<tr>";
            
            array_push($nombres, $fila2[1]." ".$fila2[2]);
            echo "<td style=padding:3px;>".$fila2[1].", ".$fila2[2]."</td>";
            $peticion3="select * from perfiles where id_materia=".$a;
            $resultado3=mysqli_query($conexion,$peticion3);
            $total=0;
            $numperfil++;
            while ($fila=mysqli_fetch_array($resultado3)) 
            {                 
                
                $peticion6="select nota from notas_perfiles where id_perfil=".$fila[0]." and id_alumno=".$fila2[0]."";
                $resultado6=mysqli_query($conexion,$peticion6);
                $fila6=mysqli_fetch_array($resultado6);
                $nota_per = $fila6[0];
                //ESTE ES EL TOTAL
                $total=(($nota_per*$fila[2])/100)+$total;
                array_push($filaperfil, $nota_per);
                //$filaperfil
                echo "<td style=padding:3px;text-align:center; >".$nota_per."</td>";                

            }
            array_push($promedios, $total);
            array_push($perfiles, $filaperfil);
            $filaperfil=array();
                if($total>6)
                    {
                      $apro++;
                      echo "<td style=background-color:green;text-align:center;>".$total."</td>";
                    }
                    else
                    {
                      $repro++;
                      echo "<td style=background-color:red;text-align:center;>".number_format((float)$total, 2, '.', '')."</td>";
                    }
                echo "</tr>";
                $filasi++;
        }        
        echo "</table></div>";
        echo "<script type='text/javascript'>
var tabla=[[
";
foreach ($titulos as $key => $value) 
{   
    if($key==sizeof($titulos)-1)
    {
      echo "'".$value."'";
    }
    else if($key<sizeof($titulos)-1)
    {
      echo "'".$value."',";
    }


}
echo "],";
$columnasj=0;
//echo ($cantidad_perfiles);
if($numperfil==1)
{

}
  
for($i=0;$i<$numperfil;$i++)
{

    echo "['".$nombres[$i]."',";
    for($j=0;$j<$cantidad_perfiles;$j++)
    {
        echo "".$perfiles[$i][$j].",";
    }
    
    if($i<$numperfil-1)
    {
      echo "".number_format((float)$promedios[$i], 2, '.', '')."],";
    }
    else
    {
      echo "".number_format((float)$promedios[$i], 2, '.', '')."]";
    }
    if($i<$numperfil-1)
    {
      //echo ",";
    }
    
    
}
echo "];</script>";
echo "<button type='button' onclick='javascript:exportar_excel(tabla,".($filasi+1).",".($cantidad_perfiles+2).");'>Descargar datos en archivo de excel</button>";
echo "<div  id='prueba' style='display:none;'><a id='descarga' download='notas.xls' href='importar_excel.xls'>asfs</a></div>";

        echo '<div id="chartdiv" style="width: 100%; height: 400px;"></div>';
        $script='<script src="../amcharts/amcharts.js" type="text/javascript"></script>
        <script src="../amcharts/pie.js" type="text/javascript"></script>        
        <script type="text/javascript">
            var chart;
            var legend;

            var chartData = [
                {
                    "estado": "Aprobado",
                    "value": '.$apro.'
                },
                {
                    "estado": "Reprobado",
                    "value": '.$repro.'
                }];
                AmCharts.ready(function () {
                // Hace q sea una grafica de tipo pastel
                chart = new AmCharts.AmPieChart();
                chart.dataProvider = chartData;

                chart.titleField = "estado";
                chart.valueField = "value";
                chart.outlineColor = "#FFFFFF";
                chart.colors=["#0DFF00","#FF0000"];
                chart.backgroundColor=
                chart.outlineAlpha = 0.8;
                chart.outlineThickness = 2;
                chart.balloonText = "[[title]]<br><span><b>[[value]]</b> ([[percents]]%)</span>";
                //Hace la grafica 3D
                chart.depth3D = 15;
                chart.angle = 30;

                // Escribe o dibuja la grafica
                chart.write("chartdiv");
            });
        </script>';
        echo $script;
        
      /*  $letras=array("A","B","C","D","E","F","G","H");
foreach ($titulos as $key => $value) 
{ 
    echo $letras[$key].'1', $value;
}
echo "<br>";
$ultcol=$numperfil;
for($i=0;$i<$cantidad_perfiles-1;$i++)
{    
    echo "A".($i+2), $nombres[$i];
    for($j=0;$j<$numperfil;$j++)
    {
        echo $letras[$j+1].($i+2)."  -  ".$perfiles[$i][$j];
    }
    echo $letras[$ultcol+1].($i+2)."  - ".$promedios[$i]."<br>";
}*/

}

    
?>
<?php 
include("../includes/footer.php");
?>
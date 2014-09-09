<?php 
include("../includes/inheader.php");
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
          while ($fila5=mysqli_fetch_array($resultado)){
            echo "<th style=padding:3px;>".$fila5[1]."</th>";
          }
          echo "<th style=padding:3px;>Promedio</th>";
         

       // var_dump($peticion);
        while($fila2=mysqli_fetch_array($resultado2)){
            echo "<tr>";
            echo "<td style=padding:3px;>".$fila2[1].", ".$fila2[2]."</td>";
            $peticion3="select * from perfiles where id_materia=".$a;
            $resultado3=mysqli_query($conexion,$peticion3);
            $total=0;
            while ($fila=mysqli_fetch_array($resultado3)) { 

                    $peticion6="select nota from notas_perfiles where id_perfil=".$fila[0]." and id_alumno=".$fila2[0]."";
                    $resultado6=mysqli_query($conexion,$peticion6);
                    $fila6=mysqli_fetch_array($resultado6);
                    $nota_per = $fila6[0];
                    //ESTE ES EL TOTAL
                    $total=(($nota_per*$fila[2])/100)+$total;
                    
                    echo "<td style=padding:3px;>".$nota_per."</td>";

                }
                if($total>6)
                    {
                      $apro++;
                      echo "<td style=background-color:green;>".$total."</td>";
                    }
                    else
                    {
                      $repro++;
                      echo "<td style=background-color:red;>".$total."</td>";
                    }
                echo "</tr>";
        }        
        echo "</table>";
        

        
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
                // PIE CHART
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
                // this makes the chart 3D
                chart.depth3D = 15;
                chart.angle = 30;

                // WRITE
                chart.write("chartdiv");
            });
        </script>';
        echo $script;
        include("../includes/footer.php");
    }
    

?> 

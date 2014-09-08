<?php include("../includes/inheader.php");
echo '<div id="linkgraficos"> <img id="imagens1"></img></div>';
$html="<div id='chartdiv' style='width: 640px; height: 400px;'>
<img src=''></img></div>
";



echo '<script src="../amcharts/amcharts.js" type="text/javascript"></script>
        <script src="../amcharts/serial.js" type="text/javascript"></script>
        <script src="../amcharts/exporting/amexport.js" type="text/javascript"></script>
        <script src="../amcharts/exporting/rgbcolor.js" type="text/javascript"></script>
        <script src="../amcharts/exporting/canvg.js" type="text/javascript"></script>        
        
        <script type="text/javascript">
            var chart;
            var chartData = [{
                "country": "USA",
                    "visits": 4025,
                    "color": "#FF0F00"
            }, {
                "country": "China",
                    "visits": 1882,
                    "color": "#FF6600"
            }, {
                "country": "Japan",
                    "visits": 1809,
                    "color": "#FF9E01"
            }, {
                "country": "Germany",
                    "visits": 1322,
                    "color": "#FCD202"
            }, {
                "country": "UK",
                    "visits": 1122,
                    "color": "#F8FF01"
            }, {
                "country": "France",
                    "visits": 1114,
                    "color": "#B0DE09"
            }, {
                "country": "India",
                    "visits": 984,
                    "color": "#04D215"
            }, {
                "country": "Spain",
                    "visits": 711,
                    "color": "#0D8ECF"
            }, {
                "country": "Netherlands",
                    "visits": 665,
                    "color": "#0D52D1"
            }, {
                "country": "Russia",
                    "visits": 580,
                    "color": "#2A0CD0"
            }, {
                "country": "South Korea",
                    "visits": 443,
                    "color": "#8A0CCF"
            }, {
                "country": "Canada",
                    "visits": 441,
                    "color": "#CD0D74"
            }, {
                "country": "Brazil",
                    "visits": 395,
                    "color": "#754DEB"
            }, {
                "country": "Italy",
                    "visits": 386,
                    "color": "#DDDDDD"
            }, {
                "country": "Australia",
                    "visits": 384,
                    "color": "#999999"
            }, {
                "country": "Taiwan",
                    "visits": 338,
                    "color": "#333333"
            }, {
                "country": "Poland",
                    "visits": 328,
                    "color": "#000000"
            }];


            var chart = AmCharts.makeChart("chartdiv", {
                type: "serial",
                dataProvider: chartData,
                pathToImages: "../amcharts/images/",
                categoryField: "country",
                depth3D: 20,
                angle: 30,

                categoryAxis: {
                    labelRotation: 90,
                    gridPosition: "start"
                },

                valueAxes: [{
                    title: "Visitors"
                }],

                graphs: [{

                    valueField: "visits",
                    colorField: "color",
                    type: "column",
                    lineAlpha: 0,
                    fillAlphas: 1
                }],

                chartCursor: {
                    cursorAlpha: 0,
                    zoomable: false,
                    categoryBalloonEnabled: false
                },

                amExport: {
                    top: 50,
                    right: 21
                }
            });
            chart.amExport;
        </script>'

?>


<form name="form" method="post" action="prueba.php" enctype="multipart/form-data">    
        <input class="bids" type="text" name="grado" value='2'>                                 
        <input class="bids" type="text" name="gradff"id="prueba" value='2'>        
        <image type="file" name="photo" id="imagen1"value="javascript:document.getElemnt" />
        <button type="submit" class="pill orange" ><i>Elegir perfil</i></button>
          </form>
        
   

    <script type="text/javascript">
    
    window.onload = function () {document.getElementById("linkdegrafica").click();
    document.getElementById("prueba").value=document.getElementById("imagen1").src;    
     }
    </script>

<?php
echo $html;

//<!-- Table -->



echo '';
?>
<script src="../js/funciones.js" type="text/javascript"></script> 
    </body>

    </html>

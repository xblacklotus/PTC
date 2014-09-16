<?php
include("../includes/inheader.php");
?>
<br>
<center><link href="../css/calendario.css" type="text/css" rel="stylesheet">
<script src="../js/calendar.js" type="text/javascript"></script>
<script src="../js/calendar-es.js" type="text/javascript"></script>
<script src="../js/calendar-setup.js" type="text/javascript"></script>
</head>
<body>
	<input type="text" name="fecha" id="fecha" value="dd-mm-yyyy" /> 
<img src="../imgs/calendario.png" width="16" height="16" border="0" title="Fecha Inicial" id="lanzador">
<!-- script que define y configura el calendario--> 
<script type="text/javascript"> 
   Calendar.setup({ 
    inputField     :    "ingreso",     // id del campo de texto 
     ifFormat     :     "%d-%m-%Y",     // formato de la fecha que se escriba en el campo de texto 
     button     :    "lanzador"     // el id del botón que lanzará el calendario 
}); 
</script>
</center>
<br>
<textarea name="actividad" placeholder="Actividad a ingresar"></textarea>

</body>
</html>

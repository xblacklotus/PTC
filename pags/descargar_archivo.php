<?php include("../includes/config.inc");?>
<?php

if (isset($_POST)) {

         $idd= $_POST['id'];
         echo '<script name="accion">'.$idd.'</script>';
         $qry = "SELECT tipo, contenido,nombre FROM archivos WHERE id='".$idd."'";
		 $res = mysqli_query($conexion,$qry);
		 $fila=mysqli_fetch_array($res);
		 $tipo=$fila[0];
		 $contenido=$fila[1];
		 $nombre=$fila[2];
		 //$tipo = mysqli_result($res, 0, "tipo");
		// $contenido = mysqli_result($res, 0, "contenido");


		header("Content-Disposition: attachment; filename=".$nombre."");
		 //print $tipo;
		 print $contenido;
     }
     else{
     	echo '<script name="accion">vale verga</script>';
     }

var_dump($_POST);



?>
     
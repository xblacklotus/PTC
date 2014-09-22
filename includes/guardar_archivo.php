<?php include("config.inc");
if($_POST) {
        $id=$_POST['id'];
        }
$archivo = $_FILES["archivito"]["tmp_name"]; 
 $tamanio = $_FILES["archivito"]["size"];
 $tipo    = $_FILES["archivito"]["type"];
 $nombre  = $_FILES["archivito"]["name"];
 $titulo  = $_POST["titulo"];

 if ( $archivo != "none" )
 {
    $fp = fopen($archivo, "rb");
    $contenido = fread($fp, $tamanio);
    $contenido = addslashes($contenido);
    fclose($fp); 

    $qry = "INSERT INTO archivos VALUES 
            (0,'".$nombre."','".$titulo."','".$contenido."','".$tipo."','".$id."','".$tamanio."')";
    $re=mysqli_query($conexion,$qry);
    //mysql_query($qry);

    if($re)
       print "Se ha guardado el archivo en la base de datos.";
    else
       print "NO se ha podido guardar el archivo en la base de datos.";
 }
 else{
    print "No se ha podido subir el archivo al servidor";
 }
 ?>
    
<?php
//cargamos el archivo al servidor con el mismo nombre
//solo le agregue el sufijo bak_
$archivo = $_FILES["file"]['name'];
$tipo = $_FILES["file"]['type'];
$destino = "bak_".$archivo;
if (copy($_FILES["file"]['tmp_name'],$destino)) 
    {
        echo "Archivo Cargado Con Éxito";
    }
else {
    echo "Error Al Cargar el Archivo";  
}
////////////////////////////////////////////////////////
if (file_exists ("bak_".$archivo)){
/** Clases necesarias */
require_once('Classes/PHPExcel.php');
require_once('Classes/PHPExcel/Reader/Excel2007.php');
// Cargando la hoja de cálculo
$objReader = new PHPExcel_Reader_Excel2007();
$objPHPExcel = $objReader->load("bak_".$archivo);
$objFecha = new PHPExcel_Shared_Date();
// Asignar hoja de excel activa
$objPHPExcel->setActiveSheetIndex(0);
//conectamos con la base de datos
include("../includes/inheader.php");    
// Llenamos el arreglo con los datos  del archivo xlsx
$contador=2;
$num=0;
while ( ($objPHPExcel->getActiveSheet()->getCell('A'.$contador)->getCalculatedValue())!= "") {
    $contador++;
    $num++;
}
echo $num;  
for ($i=2;$i<=(1+$num);$i++){
$_DATOS_EXCEL[$i]['nombres'] = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
$_DATOS_EXCEL[$i]['apellidos'] = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
$_DATOS_EXCEL[$i]['grado']= $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
$_DATOS_EXCEL[$i]['id_seccion']= $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
$_DATOS_EXCEL[$i]['id_usuario'] = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
}
}
//si por algo no cargo el archivo bak_

//else{echo "Necesitas primero importar el archivo";}//echo $cont;

$errores=0;
//foreach ($valor as $campo2 => $valor2){
for ($i=2;$i<=(1+$num);$i++){
    $nombreAlumno= $_DATOS_EXCEL[$i]['nombres'];
    $apellidosAlumno= $_DATOS_EXCEL[$i]['apellidos'];
    $gradoAlumno= $_DATOS_EXCEL[$i]['grado'];
    $seccionAlumno= $_DATOS_EXCEL[$i]['id_seccion'];
    $usuarioAlumno= $_DATOS_EXCEL[$i]['id_usuario'];
    $peticion= "insert into alumno (nombres,apellidos,grado,id_seccion,id_usuario) VALUES ('".$nombreAlumno."','".$apellidosAlumno."','".$gradoAlumno."','".$seccionAlumno."','".$usuarioAlumno."')";
    echo $peticion;
    $resultado=mysqli_query($conexion,$peticion);
    if($resultado)
    {
        echo "Exito";
    }
    else
    {
        echo "Error";
    }
    echo $_DATOS_EXCEL[$i]['nombres'];
    echo $_DATOS_EXCEL[$i]['apellidos'];
    echo $_DATOS_EXCEL[$i]['grado'];
    echo $_DATOS_EXCEL[$i]['id_seccion'];
    echo $_DATOS_EXCEL[$i]['id_usuario'];
    echo "<br/>";
}

unlink($destino);
?>

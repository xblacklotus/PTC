<?php 
$uploadedStatus = 0;
echo "aaaaaaa";
if ( isset($_POST["submit"]) ) {
    echo "aaaaaaa";
    if ( isset($_FILES["file"])) {
        echo "aaaaaaa";
        //if there was an error uploading the file
        if ($_FILES["file"]["error"] > 0) {
            echo "aaaaaaa";
         echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
        }
        else {
            if (file_exists($_FILES["file"]["name"])) {
                unlink($_FILES["file"]["name"]);
            }
            $fileName = $_FILES["file"]["name"]; 
            $fileTmpLoc = $_FILES["file"]["tmp_name"];
            $pathAndName = "C:/wamp/www/".$fileName;
            $moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
            echo $moveResult;
             echo "aaaaaaa";
            if ($moveResult == true) {
                    echo "File has been moved from " . $fileTmpLoc . " to" . $pathAndName;
            } else {
                 echo "ERROR: File not moved correctly";
}
            /*$storagename = "alumnos.xlsx";
            move_uploaded_file($_FILES["file"]["tmp_name"],  $storagename);*/
            $uploadedStatus = 1;
        }
    } else {
    echo "No file selected <br />";
    }
}

/*set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
include 'PHPExcel/IOFactory.php';
 
// This is the file path to be uploaded.
$inputFileName = 'alumnos.xlsx';
 
try {
    $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
} catch(Exception $e) {
    die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
}
?>*/
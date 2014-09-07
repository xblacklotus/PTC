<?php 
//include("config.inc");
// Check if a file has been uploaded
if(isset($_FILES['uploaded_file'])) {
    // Make sure the file was sent without errors
    if($_FILES['uploaded_file']['error'] == 0) {
        // Connect to the database
        $dbLink = new mysqli('localhost', 'root', '', 'ptc');
        if(mysqli_connect_errno()) {
            die("MySQL connection failed: ". mysqli_connect_error());
        }
 
        // Gather all required data
        $nombre = $dbLink->real_escape_string($_FILES['uploaded_file']['name']);
        $apellido = $dbLink->real_escape_string($_FILES['uploaded_file']['mime']);
        $grado = $dbLink->real_escape_string($_FILES['uploaded_file']['size']);
        $seccion = $dbLink->real_escape_string($_FILES['uploaded_file']['created']);
        $usuario = $dbLink->real_escape_string($_FILES['uploaded_file']['id_usuario']);
 
        // Create the SQL query
        $query = "
            INSERT INTO `alumno` (
                `nombres`, `apellidos`, `grado`, `id_seccion`, `id_usuario`
            )
            VALUES (
                '{$nombre}', '{$apellido}', {$grado}, '{$seccion}', '{$usuario}'
            )";
 
        // Execute the query
        $result = $dbLink->query($query);
 
        // Check if it was successfull
        if($result) {
            echo 'Success! Your file was successfully added!';
        }
        else {
            echo 'Error! Failed to insert the file'
               . "<pre>{$dbLink->error}</pre>";
        }
    }
    else {
        echo 'An error accured while the file was being uploaded. '
           . 'Error code: '. intval($_FILES['uploaded_file']['error']);
    }
 
    // Close the mysql connection
    $dbLink->close();
}
else {
    echo 'Error! A file was not sent!';
}
 
// Echo a link back to the main page
echo '<p>Click <a href="index.html">here</a> to go back</p>';
?>
<?php
function subir(){
   $file_type = $_FILES['file']['type'];
 
        include '../conn.php';

 
if (isset($_POST['subir'])) {
    if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
        echo "<h1>" . "File ". $_FILES['filename']['name'] ." subido." . "</h1>";
        echo "<h2>Datos subidos:</h2>";
        readfile($_FILES['filename']['tmp_name']);
    }
 
    //Import uploaded file to Database
    $handle = fopen($_FILES['filename']['tmp_name'], "r");
 
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $import="INSERT INTO candidato (cv_file) values ('".$data[0]."')";

    }
 
    fclose($handle);
 
    print "Import hecho!";
 
}
 
}
?>
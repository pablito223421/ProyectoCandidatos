<?php
include '../conn.php';
$id = $_GET['id']; 
$query = "DELETE FROM vacante WHERE rowid=$id";

if( $db->query($query) ){
    $message = "La vacante ha sido eliminado de la manera correcta";
}else {
    $message = "La vacante no existe o ya había sido eliminada";
}
echo $message;
?>
<a href="index.php">Regresar a la lista de Vacantes</a>

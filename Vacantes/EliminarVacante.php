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

<html>
<head>
<title>Eliminar Vacante</title>
    <link  rel="stylesheet" href="../css/vacante.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <h1 color="red" class="titulo_vac" align="center">La Vacante ha sido eliminada de manera correcta</h1>
<a class="btn btn-outline-primary" align="center" name="submit_data" type="submit" value="Regresar a la Lista de Vacantes" href="index.php"></a>

</body>
</html>
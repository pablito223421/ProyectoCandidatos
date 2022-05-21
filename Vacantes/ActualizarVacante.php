<?php

$message = ""; 

include '../conn.php';

if( isset($_POST['submit_data']) ){

    $id = $_POST['id'];
    $nombrevac = $_POST['nombrevac'];
    $descripcion = $_POST['descripcion'];
	$habtecreq = $_POST['habtecreq'];
    $habtecdes = $_POST['habtecdes'];
	$escolaridad = $_POST['escolaridad'];
  $experiencia= $_POST['experiencia'];
	$estatus = $_POST['estatus'];


    $query = "UPDATE vacante set nombrevac='$nombrevac', descripcion='$descripcion', habtecreq='$habtecreq', habtecdes='$habtecdes',escolaridad='$escolaridad', experiencia='$experiencia',estatus='$estatus' WHERE id=$id";
   
    if( $db->exec($query) ){

      $message = "Los datos han sido modificados correctamente.";

  }else{

      $message = "Los datos no han sido modificados de manera correcta.";
  }
} 
$id= $_GET['id']; 
$result = $db->query("SELECT id, * FROM vacante WHERE id=$id");
$data = $result->fetchArray(); 

?>
<!DOCTYPE html>
<html>
<head>
    <title>Editar Vacante</title>
    <link  rel="stylesheet" href="../css/vacante.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<h1 class="titulo_vac" align="center">Modificar alguna vacante</h1>
    <div style=" margin: 20px 100px;">
        <table class="table">
            <form action="" method="post" >
            <input type="hidden" name="id" id="id" value="<?php echo $id;?>">
            <tr class="table-info" id="texto">
                <td>Nombre de la vacante</td>
                <td><input name="nombrevac" id="nombrevac" type="text" value="<?php echo $data['nombrevac'];?>"></td>
            </tr>
            <tr class="table-info" id="texto">
                <td>Descripción</td>
                <td><input name="descripcion" id="descripcion" type="text" value="<?php echo $data['descripcion'];?>"></td>
            </tr>
            <tr class="table-info" id="texto">
                <td>Habilidades técnicas requeridas</td>
                <td><input name="habtecreq" id="habtecreq" type="text" value="<?php echo $data['habtecreq'];?>"></td>
            </tr>
            <tr class="table-info" id="texto">
                <td>Habilidades técnicas deseables</td>
                <td><input name="habtecdes" id="habtecdes" type="text" value="<?php echo $data['habtecdes'];?>"></td>
            </tr>
            <tr class="table-info" id="texto">
                <td>Escolaridad</td>
                <td><input name="escolaridad" id="escolaridad" type="text" value="<?php echo $data['escolaridad'];?>"></td>
            </tr>
            <tr class="table-info" id="texto">
                <td>Tiempo de experiencia</td>
                <td><input name="experiencia" id="experiencia" type="text" value="<?php echo $data['experiencia'];?>"></td>
            </tr>
            <tr class="table-info" id="texto">
                <td>Estatus</td>
                <td><input name="estatus" id="estatus" type="text" value="<?php echo $data['estatus'];?>"></td>
            </tr>
            <tr class="table-info" id="texto">
                <td><a class="btn btn-outline-primary" href="index.php">Lista de Vacantes</a></td>
                <td><input type="image" src="https://cdn-icons-png.flaticon.com/512/15/15071.png" width="60" height="60"  id="btnActualiza" onclick="ActualizarVacante();" name="submit_data" type="submit" ></td>
            </tr>
            </form>
        </table>
    </div>
    <script src="../js/JSVacantes/script.js"></script>
</body>
</html>
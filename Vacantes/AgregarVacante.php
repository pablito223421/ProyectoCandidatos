<?php
$message = '';

if( isset($_POST['submit_data']) ){

    include '../conn.php';
    $nombrevac = $_POST['nombrevac'];
    $descripcion = $_POST['descripcion'];
	$habtecreq = $_POST['habtecreq'];
    $habtecdes = $_POST['habtecdes'];
	$escolaridad = $_POST['escolaridad'];
    $experiencia= $_POST['experiencia'];
	$estatus = $_POST['estatus'];

    $query = "INSERT INTO vacante (nombrevac, descripcion, habtecreq, habtecdes, escolaridad, experiencia, estatus  ) VALUES ('$nombrevac', '$descripcion','$habtecreq','$habtecdes','$escolaridad', '$experiencia','$estatus')";

    if( $db->exec($query) ){

        $message = "Los datos de la vacante se han agregado correctamente";
    }else{
        $message = "Los datos no se han agregado";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Agregar Vacante</title>
    <link  rel="stylesheet" href="../css/vacante.css">
        
    <script src="../js/JSVacantes/script.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<h1 class="titulo_vac" align="center">Agregar Vacantes disponibles</h1>
    <div style="margin: 20px 100px;">
        <table class="table">
            <form action="AgregarVacante.php"  id="frm" method="post">
            <tr class="table-info" id="texto">
                <td>Nombre de la Vacante</td>
                <td><input name="nombrevac" id="nombrevac" type="text"></td>
            </tr>
            <tr class="table-info" id="texto">
                <td>Descripción</td>
                <td><input name="descripcion" id="descripcion" type="text"></td>
            </tr>
			<tr class="table-info" id="texto">
                <td>Habilidades técnicas requeridas</td>
                <td><input name="habtecreq" id="habtecreq"  type="text"></td>
            </tr class="table-info" id="texto">
            <tr class="table-info" id="texto">
                <td>Habilidades técnicas deseables</td>
                <td><input name="habtecdes" id="habtecdes" type="text"></td>
            </tr>
			<tr class="table-info" id="texto">
                <td>Escolaridad</td>
                <td><input name="escolaridad" id="escolaridad" type="text"></td>
            </tr>
			<tr class="table-info" id="texto">
                <td>Tiempo de Experiencia</td>
                <td><input name="experiencia" id="experiencia"  type="text"></td>
            </tr>
            <tr class="table-info" id="texto">
                <td>Estatus</td>
                <td><input name="estatus" id="estatus"  type="text"></td>
            </tr>
            <tr class="table-info" id="texto">
                <td><a href="index.php"><button type="button" class="btn btn-success">Lista de Vacante</button></a></td>
                <td><input name="submit_data" class="btn btn-info"  onclick="GuardarVacante();"id="btnVacante" type="submit" value="Agregar"></td>
            </tr>
            </form>
        </table>
    </div>
</body>
</html>
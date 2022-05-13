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
</head>
<body>
    <div style="width: 500px; margin: 20px auto;">
        <div><?php echo $message;?></div>
        <table width="100%" cellpadding="5" cellspacing="1" border="1">
            <form action="AgregarVacante.php" method="post">
            <tr>
                <td>Nombre de la Vacante:</td>
                <td><input name="nombrevac" type="text"></td>
            </tr>
            <tr>
                <td>Descripción:</td>
                <td><input name="descripcion" type="text"></td>
            </tr>
			<tr>
                <td>Habilidades técnicas requeridas:</td>
                <td><input name="habtecreq" type="text"></td>
            </tr>
            <tr>
                <td>Habilidades técnicas deseables:</td>
                <td><input name="habtecdes" type="text"></td>
            </tr>
			<tr>
                <td>Escolaridad:</td>
                <td><input name="escolaridad" type="text"></td>
            </tr>
			<tr>
                <td>Tiempo de Experiencia:</td>
                <td><input name=" experiencia" type="text"></td>
            </tr>
            <tr>
                <td>Estatus:</td>
                <td><input name="estatus" type="text"></td>
            </tr>
            <tr>
                <td><a href="index.php">Lista de Vacante</a></td>
                <td><input name="submit_data" type="submit" value="Agregar Vacante"></td>
            </tr>
            </form>
        </table>
    </div>
</body>
</html>

<?php

$message = '';

include '../conn.php';

if( isset($_POST['submit_data']) ){

    
    $nombre = $_POST['nombre'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
	$nacionalidad = $_POST['nacionalidad'];
    $ciudad_residencia = $_POST['ciudad_residencia'];
    $cv_file= $_POST['cv_file'];
    $more_attributes= $_POST['more_attributes'];

    $query = "INSERT INTO candidato ( nombre, fecha_nacimiento, nacionalidad, ciudad_residencia, cv_file, more_attributes ) VALUES ('$nombre', '$fecha_nacimiento', '$nacionalidad', '$ciudad_residencia', '$cv_file', '$more_attributes')";

    if( $db->exec($query) ){

        $message = "Los datos del candidato se han agregado correctamente";

    }else{

        $message = "Los datos  del candidato no se han agragado";

    }

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro de Candidatos</title>
    <script>
var form = document.getElementById("form-id-subir");
document.getElementById("descargarA").addEventListener("click", function () {
  form.submit();
});
</script>
</head>
<body>
    <div style="width: 500px; margin: 20px auto;">
        <div><?php echo $message;?></div>
        <table width="100%" cellpadding="5" cellspacing="1" border="1">
            <form action="RegistrarCandidatos.php" method="post">
            <tr>
                <td>Nombre del candidato:</td>
                <td><input name="nombre" type="text"></td>
            </tr>
            <tr>
                <td>Fecha de Nacimiento:</td>
                <td><input name="fecha_nacimiento" type="date"></td>
            </tr>
			<tr>
                <td>Nacionalidad:</td>
                <td><input name="nacionalidad" type="text"></td>
            </tr>
            <tr>
                <td>Ciudad de Residencia:</td>
                <td><input name="ciudad_residencia" type="text"></td>
            </tr>
			<tr>
                <td>Curriculum Vitae:</td>
                <td>
                Selecciona el fichero a importar:<br />
<input size='50' type='file' name='cv_file'><br />
  <input type="hidden" name="subir" value="admin1">
  <br />
</td>
            </tr>
			<tr>
                <td>Atributos:</td>
                <td><input name=" more_attributes" type="text"></td>
            </tr>
            <tr>
                <td><a href="./index.php">Lista de candidatos</a></td>
                <td><input name="submit_data" type="submit" value="Agregar Candidato"></td>
            </tr>
            </form>
        </table>
    </div>
</body>
</html>
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

$id = $_GET['id']; 
$query = "SELECT id, * FROM vacante WHERE id=$id";
$result = $db->query($query);
$data = $result->fetchArray(); 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Editar Vacante</title>
</head>
<body>
    <div style="width: 500px; margin: 20px auto;">
        <div><?php echo $message;?></div>
        <table width="100%" cellpadding="5" cellspacing="1" border="1">
            <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <tr>
                <td>Nombre de la vacante:</td>
                <td><input name="nombrevac" type="text" value="<?php echo $data['nombrevac'];?>"></td>
            </tr>
            <tr>
                <td>Descripción:</td>
                <td><input name="descripcion" type="text" value="<?php echo $data['descripcion'];?>"></td>
            </tr>
            <tr>
                <td>Habilidades técnicas requeridas:</td>
                <td><input name="habtecreq" type="text" value="<?php echo $data['habtecreq'];?>"></td>
            </tr>
            <tr>
                <td>Habilidades técnicas deseables:</td>
                <td><input name="habtecdes" type="text" value="<?php echo $data['habtecdes'];?>"></td>
            </tr>
            <tr>
                <td>Escolaridad:</td>
                <td><input name="escolaridad" type="text" value="<?php echo $data['escolaridad'];?>"></td>
            </tr>
            <tr>
                <td>Tiempo de experiencia:</td>
                <td><input name="experiencia" type="text" value="<?php echo $data['experiencia'];?>"></td>
            </tr>
            <tr>
                <td>estatus:</td>
                <td><input name="estatus" type="text" value="<?php echo $data['estatus'];?>"></td>
            </tr>
            <tr>
                <td><a href="index.php">Atras</a></td>
                <td><input name="submit_data" type="submit" value="Editar Vacante"></td>
            </tr>
            </form>
        </table>
    </div>
</body>
</html>

<?php

include '../conn.php';


$query = "SELECT * FROM vacante";
$result = $db->query($query);
?>

<?php

include '../conn.php';
$query1 = "SELECT * FROM vacante";
$result1 = $db->query($query1);
?>

<!DOCTYPE html>

<html>
<head>
    <title>Lista de Vacantes</title>
</head>
<body>
    <div style="width: 500px; margin: 20px auto;">
     
        <table width="100%" cellpadding="5" cellspacing="1" border="1">
            <tr>
			    <td>Número de la vacante</td>
                <td>Nombre</td>
                <td>Descripción</td>
				<td>Habilidades técnicas requeridas</td>
				<td>Habilidades técnicas deseables</td>
				<td>Escolaridad</td>
				<td>Tiempo de Experiencia</td>
				<td>Estatus</td>
            </tr>
            <?php while($row = $result->fetchArray()) {?>
            <tr>
			    <td><?php echo $row['id'];?></td>
                <td><?php echo $row['nombrevac'];?></td>
                <td><?php echo $row['descripcion'];?></td>
				<td><?php echo $row['habtecreq'];?></td>
                <td><?php echo $row['habtecdes'];?></td>
				<td><?php echo $row['escolaridad'];?></td>
				<td><?php echo $row['experiencia'];?></td>
                <td><?php echo $row['estatus'];?></td>
            </tr>
            <?php } ?>
        </table>
        <a href="RegistrarCandidatos.php">Registrar Candidatos</a>
    </div>
</body>
</html>
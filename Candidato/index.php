<?php

include '../conn.php';
$query = "SELECT * FROM vacante";
$result = $db->query($query);
?>

<!DOCTYPE html>

<html>
<head>
    <title>Lista de Vacantes</title>
</head>
<body>
    <div style="width: 500px; margin: 20px auto;">
        <a href="AgregarVacante.php">Agregar Vacantes</a>
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
                <td>Acciones</td>
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
                <td>
                    <a href=".php?id=<?php echo $row['id'];?>">Editar Vacante</a> |
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
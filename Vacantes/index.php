<?php

include '../conn.php';
$query = "SELECT * FROM vacante";
$result = $db->query($query);
?>

<!DOCTYPE html>

<html>
<head>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>


  <link type="text/css" rel="stylessheet" href="../css/vacante.css">
    <title>Lista de Vacantes</title>
</head>
<body>
    <div style="width: 500px; margin: 20px auto;">
	<a href="AgregarVacante.php" ><button type="button" class="btn btn-labeled btn-warning">
                <span class="btn-label"><i class="glyphicon glyphicon-bookmark"></i></span> Agregar Vacante</button></a>
        <table width="100%" cellpadding="5" cellspacing="1" border="1">
            <tr class="table-info">
			    <td scope="col">Número de la vacante</td>
                <td scope="col">Nombre</td>
                <td scope="col">Descripción</td>
				<td scope="col">Habilidades técnicas requeridas</td>
				<td scope="col">Habilidades técnicas deseables</td>
				<td scope="col">Escolaridad</td>
				<td scope="col">Tiempo de Experiencia</td>
				<td scope="col">Estatus</td>
                <td scope="col">Acciones</td>
            </tr>
            <?php while($row = $result->fetchArray()) {?>
            <tr class="table-info">
			    <td ><?php echo $row['id'];?></td>
                <td><?php echo $row['nombrevac'];?></td>
                <td><?php echo $row['descripcion'];?></td>
				<td><?php echo $row['habtecreq'];?></td>
                <td><?php echo $row['habtecdes'];?></td>
				<td><?php echo $row['escolaridad'];?></td>
				<td><?php echo $row['experiencia'];?></td>
                <td><?php echo $row['estatus'];?></td>
                <td>
                    <a href="EditarVacante.php?id=<?php echo $row['id'];?>">Editar Vacante</a> |
                    <a href="EliminarVacante.php?id=<?php echo $row['id'];?>"  confirm('Desea eliminar esta vacante');">Eliminar Vacante</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>

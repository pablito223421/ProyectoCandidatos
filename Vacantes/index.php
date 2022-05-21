<?php
include '../conn.php';
$query = "SELECT * FROM vacante";
$result = $db->query($query);
?>

<!DOCTYPE html>

<html>
<head>
<script src="../js/JSVacantes/script.js"></script>
<link  rel="stylesheet" href="../css/vacante.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Lista de Vacantes</title>
</head>
<body>
<h1 class="titulo_candi" align="center">Lista de Vacantes disponibles</h1>
    <div style=" margin: 20px 100px;">
            <table class="table" id ="resultado">
            <tr class="table-info" id="texto">
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
            <tr class="table-info" id="load-table">
                <td scope="col"><?php echo $row['nombrevac'];?></td>
                <td scope="col"><?php echo $row['descripcion'];?></td>
				<td scope="col"><?php echo $row['habtecreq'];?></td>
                <td scope="col"><?php echo $row['habtecdes'];?></td>
				<td scope="col"><?php echo $row['escolaridad'];?></td>
				<td scope="col"><?php echo $row['experiencia'];?></td>
                <td scope="col"><?php echo $row['estatus'];?></td>
                <td>
                    <a class="btn btn-secondary" id='btnActualizar' href="ActualizarVacante.php?id=<?php echo $row['id'];?>">Editar Vacante</a> 
                    <a class="btn btn-danger" id='btnEliminar' onclick="EliminarVacante();" class='delete-btn' href="EliminarVacante.php?id=<?php echo $row['id'];?>"  confirm('Desea eliminar esta vacante');">Eliminar Vacante</a>
                    </td>
            </tr>
            <?php } ?>
        </table>
    </div>
    <div class="d-flex justify-content-center">
    <a  href="AgregarVacante.php" ><button type="button" class="btn btn-labeled btn-warning">
                <span class="btn-label"><i class="glyphicon glyphicon-bookmark"></i></span> Agregar Vacante</button></a>
    </div>
</body>
</html>

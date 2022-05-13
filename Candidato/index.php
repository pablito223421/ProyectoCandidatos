<?php

include '../conn.php';


$query = "SELECT * FROM vacante";
$result = $db->query($query);

$query1 = "SELECT * FROM candidato";
$result1 = $db->query($query1);
?>


<!DOCTYPE html>

<html>
<head>
    <title>Lista de Vacantes</title>
    <link  rel="stylesheet" href="../css/candidato.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<h1 class="titulo_candi" align="center">Lista de vacantes y candidatos disponibles</h1>
<p class="tit_vacante" align="center"> Vacantes Disponibles</p>
    <div style=" margin: 20px 100px;">
     
        <table class="table table-sm table-info">
        <thead>
               <tr id="texto">
			    <td scope="col">Número de la vacante</td>
                <td scope="col">Nombre</td>
                <td scope="col">Descripción</td>
				<td scope="col">Habilidades técnicas requeridas</td>
				<td scope="col">Habilidades técnicas deseables</td>
				<td scope="col">Escolaridad</td>
				<td scope="col">Tiempo de Experiencia</td>
				<td scope="col">Estatus</td>
                </tr>
               </thead>
            <?php while($row = $result->fetchArray()) {?>
            <tr id="texto">
			    <td scope="col"><?php echo $row['id'];?></td>
                <td scope="col"><?php echo $row['nombrevac'];?></td>
                <td scope="col"><?php echo $row['descripcion'];?></td>
				<td scope="col"><?php echo $row['habtecreq'];?></td>
                <td scope="col"><?php echo $row['habtecdes'];?></td>
				<td scope="col"><?php echo $row['escolaridad'];?></td>
				<td scope="col"><?php echo $row['experiencia'];?></td>
                <td scope="col"><?php echo $row['estatus'];?></td>
            </tr>
            <?php } ?>
        </table>
        </div>
        <p class="tit_vacante" align="center"> Lista de Candidatos</p>
    <div style=" margin: 20px 100px;">
     
        <table class="table table-sm table-info">
        <thead>
               <tr id="texto">
			    <td scope="col">Número del Candidato</td>
                <td scope="col">Nombre</td>
                <td scope="col">Fecha de Nacimiento</td>
                <td scope="col">Nacionalidad</td>
				<td scope="col">Ciudad de Residencia</td>
				<td scope="col">CV</td>
				<td scope="col">Atributos</td>
                </tr>
               </thead>
            <?php while($row = $result1->fetchArray()) {?>
            <tr id="texto">
			    <td scope="col"><?php echo $row['id'];?></td>
                <td scope="col"><?php echo $row['nombre'];?></td>
                <td scope="col"><?php echo $row['fecha_nacimiento'];?></td>
				<td scope="col"><?php echo $row['nacionalidad'];?></td>
                <td scope="col"><?php echo $row['ciudad_residencia'];?></td>
				<td scope="col"><?php echo $row['cv_file'];?></td>
				<td scope="col"><?php echo $row['more_attributes'];?></td>
            </tr>
            <?php } ?>
        </table>
        </div>
        <div class="d-flex justify-content-center">
        <a class="btn btn-primary btn-lg active" href="RegistrarCandidatos.php">Registrar Candidatos</a>
        </div>
</body>
</html>
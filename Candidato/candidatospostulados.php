<?php

include '../conn.php';


$query = "SELECT candidato.nombre,candidato.apellidos,candidato.habilidades_técnicas,vacante.nombrevac,vacante.estatus FROM candidato,vacante
WHERE (nombre = 'Luis Manuel' AND nombrevac = 'Chef de cocina')
OR  (nombre = 'Michael Stuart' AND  nombrevac = 'Contador')
OR   (nombre = 'Alfonso' AND nombrevac = 'Mesero')
OR   (nombre = 'Franco Manuel' AND  nombrevac = 'Desarrollador')
OR   (nombre = 'Brandon' AND  nombrevac = 'Lider de Proyectos')
OR  (nombre = 'José Luna' AND  nombrevac = 'Piloto de Carreras')";
$result = $db->query($query);


?>


<!DOCTYPE html>

<html>
<head>
    <title>Lista de Vacantes</title>
    <script src="../js/JSVacantes/script2.js"></script>

<link  rel="stylesheet" href="../css/candidato.css">
<link rel="stylesheet" href="../css/styles1.css">
<link rel="stylesheet" href="../css/materialdesignicons.min.css">
<link rel="stylesheet" href="../css/dataTables.bootstrap4.css">
<link rel="stylesheet" href="../css/principal.bundle.base.css">

<script src="../js/app.js"></script>
<script src="../js/chart.js"></script>
<script src="../js/data-table.js"></script>
<script src="../js/dataTables.bootstrap4.js"></script>
<script src="../js/jquery.cookie.js"></script>
<script src="../js/tabs.js"></script>
<script src="../js/template.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">



<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
   
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="../Candidato/index.php"><img src="../images/logotipo.png" width="40px" height="40px" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="../Candidato/index.php"><img src="../images/logotipo.png" width="40px" height="40px" alt="logo"/></a>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-4 w-100">
          <li class="nav-item nav-search d-none d-lg-block w-100">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="mdi mdi-magnify"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
    </nav>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="../Candidato/index.php">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">PROYECTO CANDIDATURA</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Vacantes/AgregarVacante.php">
            <i class="bi bi-archive"></i>
              <span class="menu-title">Formulario de Vacantes</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Candidato/RegistrarCandidatos.php">
            <i class="bi bi-person"></i>  
              <span class="menu-title">Formulario de Candidatos</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
            <i class="bi bi-caret-down-square-fill"></i>  
            <span class="menu-title">Páginas Disponibles</span>
            </a>
            <div class="collapse" id="auth">
              <ul  class="list-group-item list-group-item-action active">
              <i class="bi bi-person-lines-fill"></i> <li > <a class="list-group-item" href="../Vacantes/index.php"> Vacantes </a></li>
              <i class="bi bi-person-plus-fill"></i>  <li > <a class="list-group-item" href="../Candidato/index.php"> Candidatos </a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>

<h1 class="titulo_candi" align="center">Lista de candidatos postulados</h1>

        <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
        <table class="table table-sm table-info" id ="resultado">
        <thead>
               <tr id="texto">
                <td scope="col">Nombre</td>
                <td scope="col">Apellidos</td>
                <td scope="col">Habilidades Técnicas</td>
                <td scope="col">Nombre de la Vacante</td>
                <td scope="col">Estatus</td>
                </tr>
               </thead>
            <?php while($row = $result->fetchArray()) {?>
            <tr id="texto">
                <td scope="col"><?php echo $row['nombre'];?></td>
                <td scope="col"><?php echo $row['apellidos'];?></td>
                <td scope="col"><?php echo $row['habilidades_técnicas'];?></td>
                <td scope="col"><?php echo $row['nombrevac'];?></td>
                <td scope="col"><?php echo $row['estatus'];?></td>
            </tr>
            <?php } ?>
        </table>
        </div>
              </div>
        </div>
        <div class="d-flex justify-content-center">
        <a  href="../Candidato/index.php">
        <input type="image" src="https://thumbs.dreamstime.com/z/icono-transparente-del-candidato-dise%C3%B1o-s%C3%ADmbolo-de-r-humano-130312471.jpg" name="submit" width="60" height="60" alt="submit"data-toggle="modal" data-target="#indexcan"/>
        </a>
        </div>

</body>
</html>
<?php
include '../conn.php';
$id = $_GET['id']; 
$query = "DELETE FROM vacante WHERE rowid=$id";

if( $db->query($query) ){
    $message = "La vacante ha sido eliminado de la manera correcta";
}else {
    $message = "La vacante no existe o ya había sido eliminada";
}
echo $message;
?>

<html>
<head>
<title>Eliminar Vacante</title>
<link  rel="stylesheet" href="../css/vacante.css">
    <script src="../js/JSVacantes/script.js"></script>

<link  rel="stylesheet" href="../css/vacante.css">
<link rel="stylesheet" href="../css/styles1.css">
<link rel="stylesheet" href="../css/materialdesignicons.min.css">
<link rel="stylesheet" href="../css/dataTables.bootstrap4.css">
<link rel="stylesheet" href="../css/principal.bundle.base.css">


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
      <a class="navbar-brand brand-logo" href="./index.php"><img src="../images/logotipo.png" width="40px" height="40px" alt="logo"/></a>
      <a class="navbar-brand brand-logo-mini" href="./index.php"><img src="../images/logotipo.png" width="40px" height="40px" alt="logo"/></a>
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
        <a class="nav-link" href="index.html">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">PROYECTO CANDIDATURA</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./AgregarVacante.php">
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
          <i class="bi bi-person-lines-fill"></i> <li > <a class="list-group-item" href="./index.php"> Vacantes </a></li>
          <i class="bi bi-person-plus-fill"></i>  <li > <a class="list-group-item" href="../Candidato/index.php"> Candidatos </a></li>
          </ul>
        </div>
      </li>
    </ul>
  </nav>
  <h1 color="red" class="titulo_vac" align="center">La Vacante ha sido eliminada de manera correcta</h1>
<a class="btn btn-outline-primary" align="center" name="submit_data" type="submit" value="Regresar a la Lista de Vacantes" href="index.php"></a>

</body>
</html>
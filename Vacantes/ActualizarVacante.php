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

    <link  rel="stylesheet" href="../css/vacante.css">
    <script src="../js/JSVacantes/script.js"></script>

<link  rel="stylesheet" href="../css/vacante.css">
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
  
<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
              <div class="card">
                <div class="card-body">
                  <h4 h1 class="titulo_vac" align="center">Modificar Vacantes disponibles</h4>
    <div style=" margin: 20px 100px;">
        <table class="table">
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <tr class="table-info" id="texto">
                <td>Nombre de la vacante</td>
                <td><input name="nombrevac" type="text" value="<?php echo $data['nombrevac'];?>"></td>
            </tr>
            <tr class="table-info" id="texto">
                <td>Descripción</td>
                <td><input name="descripcion" type="text" value="<?php echo $data['descripcion'];?>"></td>
            </tr>
            <tr class="table-info" id="texto">
                <td>Habilidades técnicas requeridas</td>
                <td><input name="habtecreq" type="text" value="<?php echo $data['habtecreq'];?>"></td>
            </tr>
            <tr class="table-info" id="texto">
                <td>Habilidades técnicas deseables</td>
                <td><input name="habtecdes" type="text" value="<?php echo $data['habtecdes'];?>"></td>
            </tr>
            <tr class="table-info" id="texto">
                <td>Escolaridad</td>
                <td><input name="escolaridad" type="text" value="<?php echo $data['escolaridad'];?>"></td>
            </tr>
            <tr class="table-info" id="texto">
                <td>Tiempo de experiencia</td>
                <td><input name="experiencia" type="text" value="<?php echo $data['experiencia'];?>"></td>
            </tr>
            <tr class="table-info" id="texto">
                <td>Estatus</td>
                <td>
                <select name="estatus" id="estatus" value="<?php echo $data['estatus'];?>"  type="text"">
                    <option value="Nuevo">Nuevo</option>
                    <option value="En proceso">En proceso</option>
                    <option value="Seleccionado">Seleccionado</option>
                    <option value="Cerrado">Cerrado</option></select></td>
            </tr>
            <tr class="table-info" id="texto">
                <td><a class="btn btn-outline-primary" href="index.php">Atras</a></td>
                <td><input class="btn btn-outline-danger" name="submit_data"  id="btnActualiza" onclick="ActualizarVacante();" type="submit" value="Editar Vacante"></td>
            </tr>
            </form>
        </table>
    </div>
                </div>
              </div>
          </div>
        </div>
</div>
</div>
</body>
</html>
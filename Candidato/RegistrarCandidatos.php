<?php

$message = '';

include '../conn.php';


if( isset($_POST['submit_data']) ){
$nombre= $_POST['nombre'];
$apellidos= $_POST['apellidos'];
$telefono= $_POST['telefono'];
$celular= $_POST['celular'];
$fecha_nacimiento =$_POST['fecha_nacimiento'];
$estado =$_POST['estado'];
$nacionalidad =$_POST['nacionalidad'];
$ciudad_residencia= $_POST['ciudad_residencia'];
$experiencia=$_POST['experiencia'];
$correo=$data->$_POST['correo'];
$contrasena=$data->$_POST['contrasena'];

    $query = "INSERT INTO candidato ( nombre, apellidos,telefono,celular, fecha_nacimiento,estado, nacionalidad, ciudad_residencia, experiencia, correo, contrasena ) VALUES ( '$nombre', '$apellidos' , '$telefono','$celular', '$fecha_nacimiento' , '$estado', '$nacionalidad', '$ciudad_residencia' , '$experiencia', '$correo', '$contrasena')";

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
    <link  rel="stylesheet" href="../css/candidato.css">
    <script src="../js/JSVacantes/script2.js"></script>
    
    <script src="../js/app.js"></script>
<script src="../js/chart.js"></script>
<script src="../js/data-table.js"></script>
<script src="../js/dataTables.bootstrap4.js"></script>
<script src="../js/jquery.cookie.js"></script>
<script src="../js/tabs.js"></script>
<script src="../js/template.js"></script>

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



<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
              <div class="card">
                <div class="card-body">
<p class="tit_vacante" align="center"> Registro de Candidatos</p>
    <div style=" margin: 20px 100px;">
     
        <table class="table table-sm table-info">
            <form action="RegistrarCandidatos.php" method="post">
            <tr id="texto">
                <td scope="col">Nombre del candidato</td>
                <td scope="col"><input name="nombre" type="text"></td>
            </tr>
            <tr id="texto">
                <td scope="col">Apellido del candidato</td>
                <td scope="col"><input name="apellido" type="text"></td>
            </tr>
            <tr id="texto">
                <td scope="col">Telefono</td>
                <td scope="col"><input name="telefono" type="number"></td>
            </tr>
            <tr id="texto">
                <td scope="col">Celular</td>
                <td scope="col"><input name="celular" type="number"></td>
            </tr>
            <tr id="texto">
                <td scope="col">Fecha de Nacimiento</td>
                <td scope="col"><input name="fecha_nacimiento" type="date"></td>
            </tr>
            <tr id="texto">
                <td scope="col">Estado</td>
                <td scope="col"><input name="estado" type="text"></td>
            </tr>
			<tr id="texto">
                <td scope="col">Nacionalidad</td>
                <td scope="col"><input name="nacionalidad" type="text"></td>
            </tr>
            <tr id="texto">
                <td scope="col">Ciudad de Residencia</td>
                <td scope="col"><input name="ciudad_residencia" type="text"></td>
            </tr>
			<tr id="texto">
                <td scope="col">Curriculum Vitae</td>
                <td scope="col">
                <input id="inputFile" name="cv_file" type="file">
</td>
            </tr>
			<tr id="texto">
                <td scope="col">Experiencia</td>
                <td scope="col"><input name="experiencia" type="text"></td>
            </tr>
            <tr id="texto">
                <td scope="col">Correo</td>
                <td scope="col"><input name="correo" type="mail"></td>
            </tr>
            <tr id="texto">
                <td scope="col">Contraseña</td>
                <td scope="col"><input name="experiencia" type="password"></td>
            </tr>
            <tr id="texto">
                <td scope="col"><a class="btn btn-success" href="../Candidato/candidatospostulados.php">Candidatos Postulados</a></td>
                <td scope="col"><button class="btn btn-warning" name="submit_data" onclick="GuardarCandidato();" id="btnEnviar" type="submit" >Agregar Candidato
                <script>
        const btnEnviar = document.querySelector("#btnEnviar");
        const inputFile = document.querySelector("#inputFile");
        btnEnviar.addEventListener("click", () => {
            if (inputFile.files.length > 0) {
                let formData = new FormData();
                formData.append("archivo", inputFile.files[0]); 
                fetch("importar_csv.php", {
                    method: 'POST',
                    body: formData,
                })
                    .then(respuesta => respuesta.text())
                    .then(decodificado => {
                        console.log(decodificado);
                    });
            } else {
                
                alert("Selecciona un archivo");
            }
        });
    </script>
    </button>
            </td>
            </tr>
            </form>
        </table>
    </div>
</body>
</html>
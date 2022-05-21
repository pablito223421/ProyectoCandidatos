<?php

$message = '';

include '../conn.php';

if( isset($_POST['submit_data']) ){

    
    $nombre = $_POST['nombre'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
	$nacionalidad = $_POST['nacionalidad'];
    $ciudad_residencia = $_POST['ciudad_residencia'];
    $cv_file= $_POST['cv_file'];
    $more_attributes= $_POST['more_attributes'];

    $query = "INSERT INTO candidato ( nombre, fecha_nacimiento, nacionalidad, ciudad_residencia, cv_file, more_attributes ) VALUES ('$nombre', '$fecha_nacimiento', '$nacionalidad', '$ciudad_residencia', '$cv_file', '$more_attributes')";

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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<p class="tit_vacante" align="center"> Registro de Candidatos</p>
    <div style=" margin: 20px 100px;">
     
        <table class="table table-sm table-info">
            <form action="RegistrarCandidatos.php" method="post">
            <tr id="texto">
                <td scope="col">Nombre del candidato</td>
                <td scope="col"><input name="nombre" type="text"></td>
            </tr>
            <tr id="texto">
                <td scope="col">Fecha de Nacimiento</td>
                <td scope="col"><input name="fecha_nacimiento" type="date"></td>
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
                <td scope="col">Atributos</td>
                <td scope="col"><input name="more_attributes" type="text"></td>
            </tr>
            <tr id="texto">
                <td scope="col"><a class="btn btn-success" href="./index.php">Lista de Vacantes y Candidatos</a></td>
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
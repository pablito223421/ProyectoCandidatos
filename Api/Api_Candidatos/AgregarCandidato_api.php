<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = json_decode(file_get_contents('php://input'));
if (!$data) {
    http_response_code(500);
    exit;
}
$nombre= $data->nombre;
$fecha_nacimiento = $data->fecha_nacimiento;
$nacionalidad =$data->nacionalidad;
$ciudad_residencia= $data->ciudad_residencia;
$cv_file=$data->cv_file;
$more_attributes=$data->more_attributes;
$db = new SQLite3('C:/xampp/htdocs/proyectocandidatura/BD/base.db');
$sentencia = $db->prepare("INSERT INTO candidato (nombre,fecha_nacimiento,nacionalidad,ciudad_residencia,cv_file,more_attributes)
    VALUES(?, ?, ?, ?, ?, ?)");


$resultado = $sentencia->execute([$nombre,$fecha_nacimiento,$nacionalidad,$ciudad_residencia,$cv_file,$more_attributes]);
  
if($resultado == true){
        echo "El candidato se ha guardado correctamente";
    }else{
        echo "Lo siento, ocurrió un error";
    }
?>
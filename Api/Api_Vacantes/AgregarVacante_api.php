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
$nombrevac = $data->nombrevac;
$descripcion = $data->descripcion;
$habtecreq =$data->habtecreq;
$habtecdes= $data->habtecdes;
$escolaridad=$data->escolaridad;
$experiencia=$data->experiencia;
$estatus = $data->estatus;
$db = new SQLite3('C:\xampp\htdocs\proyectocandidatura\BD\base.db');
$sentencia = $db->prepare("INSERT INTO vacante (nombrevac,descripcion,habtecreq,habtecdes,escolaridad,experiencia,estatus)
    VALUES(?, ?, ?, ?, ?, ?, ?)");


$resultado = $sentencia->execute([$nombrevac,$descripcion,$habtecreq,$habtecdes,$escolaridad,$experiencia,$estatus]);
  
if($resultado == true){
        echo "La vacante se ha guardado correctamente";
    }else{
        echo "Lo siento, ocurrió un error";
    }
?>
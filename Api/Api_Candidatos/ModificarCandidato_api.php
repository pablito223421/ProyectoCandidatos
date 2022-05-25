<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$db = new SQLite3('C:\xampp\htdocs\proyectocandidatura\BD\base.db');
$sentencia = $db->prepare("UPDATE candidato
	SET nombre = :nombre,
	fecha_nacimiento = :fecha_nacimiento,
    nacionalidad = :nacionalidad,
	ciudad_residencia = :ciudad_residencia,
	cv_file = :cv_file,
	more_attributes = :more_attributes
	WHERE id = :id");

$data = json_decode(file_get_contents('php://input'), true);
$sentencia->bindParam(":id", $data["id"]);
$sentencia->bindParam(":nombre", $data["nombre"]);
$sentencia->bindParam(":fecha_nacimiento", $data["fecha_nacimiento"]);
$sentencia->bindParam(":nacionalidad", $data["nacionalidad"]);
$sentencia->bindParam(":ciudad_residencia", $data["ciudad_residencia"]);
$sentencia->bindParam(":cv_file", $data["cv_file"]);
$sentencia->bindParam(":more_attributes", $data["more_attributes"]);
$resultado = $sentencia->execute();

if($resultado == true){
	echo "El candidato se ha modificado correctamente";
}else{
	echo "Lo siento, ocurrió un error";
}
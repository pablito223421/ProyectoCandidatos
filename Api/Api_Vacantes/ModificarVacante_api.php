<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$db = new SQLite3('C:/xampp/htdocs/proyectocandidatura/BD/base.db');
$sentencia = $db->prepare("UPDATE vacante
	SET nombrevac = :nombrevac,
	descripcion = :descripcion,
    habtecreq = :habtecreq,
	habtecdes = :habtecdes,
	escolaridad = :escolaridad,
    experiencia = :experiencia,
    estatus = :estatus
	WHERE id = :id");

$data = json_decode(file_get_contents('php://input'), true);
$sentencia->bindParam(":id", $data["id"]);
$sentencia->bindParam(":nombrevac", $data["nombrevac"]);
$sentencia->bindParam(":descripcion", $data["descripcion"]);
$sentencia->bindParam(":habtecreq", $data["habtecreq"]);
$sentencia->bindParam(":habtecdes", $data["habtecdes"]);
$sentencia->bindParam(":escolaridad", $data["escolaridad"]);
$sentencia->bindParam(":experiencia", $data["experiencia"]);
$sentencia->bindParam(":estatus", $data["estatus"]);
$resultado = $sentencia->execute();

if($resultado == true){
	echo "La vacante se ha guardado correctamente";
}else{
	echo "Lo siento, ocurrió un error";
}


?>
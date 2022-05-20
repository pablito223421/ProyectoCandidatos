<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$db = new SQLite3('C:\xampp\htdocs\proyectocandidatura\BD\base.db');
$sentencia = $db->prepare("DELETE FROM vacante WHERE id = :id ");
$data = json_decode(file_get_contents('php://input'), true);
$sentencia->bindParam(":id",$data["id"]);
$res = $sentencia->execute();
if($res == true){
	echo "La vacante ha sido eliminado correctamente";
}else{
	echo "Lo siento, ocurrió un error";
}
?>
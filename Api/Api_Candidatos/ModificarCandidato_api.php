<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$db = new SQLite3('C:\xampp\htdocs\proyectocandidatura\BD\base.db');
$sentencia = $db->prepare("UPDATE candidato
	SET nombre = :nombre,
	apellidos = :apellidos,
	telefono = :telefono,
	celular = :celular,
	fecha_nacimiento = :fecha_nacimiento,
	estado = :estado,
    nacionalidad = :nacionalidad,
	ciudad_residencia = :ciudad_residencia,
	experiencia = :experiencia,
	correo = :correo,
	contrasena = :contrasena
	WHERE id = :id");



$data = json_decode(file_get_contents('php://input'), true);
$sentencia->bindParam(":id", $data["id"]);
$sentencia->bindParam(":nombre", $data["nombre"]);
$sentencia->bindParam(":apellidos", $data["apellidos"]);
$sentencia->bindParam(":telefono", $data["telefono"]);
$sentencia->bindParam(":celular", $data["celular"]);
$sentencia->bindParam(":fecha_nacimiento", $data["fecha_nacimiento"]);
$sentencia->bindParam(":estado", $data["estado"]);
$sentencia->bindParam(":nacionalidad", $data["nacionalidad"]);
$sentencia->bindParam(":ciudad_residencia", $data["ciudad_residencia"]);
$sentencia->bindParam(":experiencia", $data["experiencia"]);
$sentencia->bindParam(":correo", $data["correo"]);
$sentencia->bindParam(":contrasena", $data["contrasena"]);
$resultado = $sentencia->execute();

if($resultado == true){
	echo "El candidato se ha modificado correctamente";
}else{
	echo "Lo siento, ocurrió un error";
}
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
$apellidos= $data->apellidos;
$telefono= $data->telefono;
$celular= $data->celular;
$fecha_nacimiento =$data->fecha_nacimiento;
$estado =$data->estado;
$nacionalidad =$data->nacionalidad;
$ciudad_residencia= $data->ciudad_residencia;
$experiencia=$data->experiencia;
$correo=$data->correo;
$contrasena=$data->contrasena;
$db = new SQLite3('C:\xampp\htdocs\proyectocandidatura\BD\base.db');
$sentencia = $db->prepare("INSERT INTO candidato( nombre,apellidos, telefono, celular,fecha_nacimiento,estado,nacionalidad, ciudad_residencia, experiencia, correo, contrasena) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
 

$resultado = $sentencia->execute([ $nombre,$apellidos,$telefono,$celular,$fecha_nacimiento,$estado,$nacionalidad, $ciudad_residencia, $experiencia, $correo, $contrasena]);
  
if($resultado == true){
        echo "El candidato se ha guardado correctamente";
    }else{
        echo "Lo siento, ocurrió un error";
    }
?>
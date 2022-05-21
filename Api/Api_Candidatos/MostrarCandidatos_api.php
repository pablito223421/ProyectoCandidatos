<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$db = new SQLite3('C:\xampp\htdocs\proyectocandidatura\BD\base.db');
$res = $db->query('SELECT * FROM candidato');
$candidato;
while ($row = $res->fetchArray(PDO::FETCH_OBJ)) {
    
    $candidato[] = $row;
}
echo json_encode($candidato);

?>
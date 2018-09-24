<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

//conexao bd
include_once 'config/database.php';
 
include_once 'objects/apolice.php';

$database = new Database();
$db = $database->getConnection();

$data = json_decode(file_get_contents("php://input"));

$apolice = new Apolice($db);

$apolice->inicio = $data->inicio;
$apolice->seguradora = $data->seguradora;
$apolice->valor = $data->valorDaApolice;

if($apolice->create()){
   echo '{ "mensagem" : "OK"}';
}
else{
   
}

?>
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../controllers/filme_controller.php';

$filme_controller = new FilmeController();

$url = "http://localhost:3000/api/filmes";
$response =  $filme_controller->getFilmes($url);
echo json_encode($response);


?>  
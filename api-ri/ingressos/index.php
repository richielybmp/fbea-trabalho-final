<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../objects/ingresso.php';
include_once '../config/database.php';

$db = new Database();
$ingresso = new Ingresso($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$data = json_decode(file_get_contents("php://input"));
	
	$ingresso->id_filme = $data->_id;
	$ingresso->nome_filme = $data->titulo;
	$ingresso->horario_filme = $data->horario_filme;
	$ingresso->sala = $data->sala;
	$ingresso->quantidade_ingressos = $data->quantidade_ingressos;
	$ingresso->valor_total = $data->valor_total;
	
	if($ingresso->create()){
		echo json_encode($ingresso);
	}
} else if($_SERVER['REQUEST_METHOD'] === 'GET') {
	echo json_encode($ingresso->all());
}


?>
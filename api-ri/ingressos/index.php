<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../objects/ingresso.php';
include_once '../config/database.php';

$db = new Database();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$dados = json_decode(file_get_contents("php://input"));
	$ingressos = array();
	foreach($dados as $dado) {
		$ingresso = new Ingresso($db);
		$ingresso->id_sessao = $dado->id_sessao;
		$ingresso->valor = $dado->valor;
		$ingresso->assento = $dado->assento;
		if($ingresso->create()){
			array_push($ingressos, $ingresso);
		}
	}
	echo json_encode($ingressos);
} else if($_SERVER['REQUEST_METHOD'] === 'GET') {
	$ingresso = new Ingresso($db);
	if(isset($_GET['sessao']) && !empty($_GET['sessao'])) {
		echo json_encode($ingresso->find_by_sessao($_GET['sessao']));
	} else {
		echo '{"mensagem" : "?sessao = x"}';
	}
}


?>
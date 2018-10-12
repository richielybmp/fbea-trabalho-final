<?php

class IngressoController {
	
	private $conn;
	private $table_name = "ingressos";
	
	public function __construct($db){
		$this->conn = $db->conn;
	}
	
	public function create($ingresso){
		if($statement = $this->conn->prepare('INSERT INTO "'.$this->table_name.'" ("id_sessao", "valor", "assento")
			VALUES (:id_sessao, :valor, :assento)')){
				$statement->bindValue(':id_sessao', $ingresso->id_sessao);
				$statement->bindValue(':valor', $ingresso->valor);
				$statement->bindValue(':assento', $ingresso->assento);
				if($statement->execute()){
					$ingresso->id = $this->conn->lastInsertRowID();
					return true;
				}
		} else {
			return false;
		}
	}
	
	public function create_all($dados){
		$ingressos = array();
		$this->conn->exec("BEGIN;");
		foreach($dados as $dado) {
			if($this->create($dado)){
				array_push($ingressos, $dado);
			}
		}
		$this->conn->exec("COMMIT;");
		return $ingressos;
	}
	
	public function find_by_sessao($id_sessao){
		$ingressos=array();
		if($statement = $this->conn->prepare('SELECT id, id_sessao, valor, assento FROM "'.$this->table_name.'" WHERE id_sessao = :id_sessao')) {
			$statement->bindValue(':id_sessao', $id_sessao);
			$result = $statement->execute();
			$i=0;
			while($arr=$result->fetchArray(SQLITE3_ASSOC)) {
				$ingressos[$i]["id"] = $arr["id"];
				$ingressos[$i]["id_sessao"] = $arr["id_sessao"];
				$ingressos[$i]["valor"] = $arr["valor"];
				$ingressos[$i]["assento"] = $arr["assento"];
				$i++;
			}
		}
		return $ingressos;
	}

    public function getFilmes($url){
        require '../vendor/autoload.php';

        $myClient = new GuzzleHttp\Client([
            'headers' => ['user-Agent' => 'MyReader']
        ]);

        $response = $myClient->request('GET', $url);

        if($response->getStatusCode() == 200){
            if($response->hasHeader('content-length')){
                $contentLength = $response->getHeader('content-length')[0];
                //echo 'Dados '.$contentLength;

                //resposta da API
                $coisas = json_decode($response->getBody());

                return $coisas;
            }


        }

    }


}

?>
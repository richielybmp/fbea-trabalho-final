<?php

class Ingresso {
	
	private $conn;
	private $table_name = "ingressos";
	public $id;
	public $id_filme;
	public $nome_filme;
	public $horario_filme;
	public $sala;
	public $quantidade_ingressos;
	public $valor_total;

	public function __construct($db){
        $this->conn = $db->conn;
    }
	
	public function create(){
		if($statement = $this->conn->prepare('INSERT INTO "'.$this->table_name.'" ("id_filme", "nome_filme", "horario_filme", "sala", "quantidade_ingressos", "valor_total")
			VALUES (:id_filme, :nome_filme, :horario_filme, :sala, :quantidade_ingressos, :valor_total)')){
				$statement->bindValue(':id_filme', $this->id_filme);
				$statement->bindValue(':nome_filme', $this->nome_filme);
				$statement->bindValue(':horario_filme', $this->horario_filme);
				$statement->bindValue(':sala', $this->sala);
				$statement->bindValue(':quantidade_ingressos', $this->quantidade_ingressos);
				$statement->bindValue(':valor_total', $this->valor_total);
				if($statement->execute()){
					$this->id = $this->conn->lastInsertRowID();
					return true;
				}
		} else {
			return false;
		}
	}
	
	public function all(){
		$ingressos=array();
		if($statement = $this->conn->prepare('SELECT id, id_filme,nome_filme, horario_filme, sala, quantidade_ingressos, valor_total FROM "'.$this->table_name.'"')) {
			$result = $statement->execute();
			$i=0;
			while($arr=$result->fetchArray(SQLITE3_ASSOC)) {
				$ingressos[$i]["id"] = $arr["id"];
				$ingressos[$i]["id_filme"] = $arr["id_filme"];
				$ingressos[$i]["nome_filme"] = $arr["nome_filme"];
				$ingressos[$i]["horario_filme"] = $arr["horario_filme"];
				$ingressos[$i]["sala"] = $arr["sala"];
				$ingressos[$i]["quantidade_ingressos"] = $arr["quantidade_ingressos"];
				$ingressos[$i]["valor_total"] = $arr["valor_total"];
				$i++;
			}
		}
		return $ingressos;
	}
	
}

?>
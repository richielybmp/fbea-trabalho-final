<?php

class Ingresso {
	
	private $conn;
	private $table_name = "ingressos";
	public $id;
	public $id_sessao;
	public $valor;
	public $assento;

	public function __construct($db){
        $this->conn = $db->conn;
    }
	
	public function create(){
		if($statement = $this->conn->prepare('INSERT INTO "'.$this->table_name.'" ("id_sessao", "valor", "assento")
			VALUES (:id_sessao, :valor, :assento)')){
				$statement->bindValue(':id_sessao', $this->id_sessao);
				$statement->bindValue(':valor', $this->valor);
				$statement->bindValue(':assento', $this->assento);
				if($statement->execute()){
					$this->id = $this->conn->lastInsertRowID();
					return true;
				}
		} else {
			return false;
		}
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
	
}

?>
<?php

class Sessao {
	
	private $conn;
	private $table_name = "sessoes";
	
	public $id;
	public $id_filme;
	public $horario;
	public $sala;
	public $cinema;
	public $total_ingressos = 80;
	
	
	public function __construct($db){
		$this->conn = $db->conn;
	}
	
	public function create(){
		if($statement = $this->conn->prepare('INSERT INTO "'.$this->table_name.'" ("id_filme", "horario", "sala", "cinema", "total_ingressos")
			VALUES (:id_filme, :horario, :sala, :cinema, :total_ingressos)')){
				$statement->bindValue(':id_filme', $this->id_filme);
				$statement->bindValue(':horario', $this->horario);
				$statement->bindValue(':sala', $this->sala);
				$statement->bindValue(':cinema', $this->cinema);
				$statement->bindValue(':total_ingressos', $this->total_ingressos);
				if($statement->execute()){
					$this->id = $this->conn->lastInsertRowID();
					return true;
				}
		} else {
			return false;
		}
	}
	
	public function find_by_filme($id_filme){
		$sessoes=array();
		if($statement = $this->conn->prepare('SELECT id, id_filme, horario, sala, cinema, total_ingressos FROM "'.$this->table_name.'" WHERE id_filme = :id_filme')) {
			$statement->bindValue(':id_filme', $id_filme);
			$result = $statement->execute();
			$i=0;
			while($arr=$result->fetchArray(SQLITE3_ASSOC)) {
				$sessoes[$i]["id"] = $arr["id"];
				$sessoes[$i]["id_filme"] = $arr["id_filme"];
				$sessoes[$i]["horario"] = $arr["horario"];
				$sessoes[$i]["sala"] = $arr["sala"];
				$sessoes[$i]["cinema"] = $arr["cinema"];
				$sessoes[$i]["total_ingressos"] = $arr["total_ingressos"];
				$i++;
			}
		}
		return $sessoes;
	}
}

?>
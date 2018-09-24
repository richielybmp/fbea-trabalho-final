<?php

class Apolice {
	
	private $conn;
    private $table_name = "apolices";
	
	public $inicio;
	public $seguradora;
	public $valor;
	
	public function __construct($db){
        $this->conn = $db;
    }
	
	public function create(){
		$query = "INSERT INTO " . $this->table_name . " SET inicio=STR_TO_DATE(:inicio, '%d/%m/%Y'), seguradora=:seguradora, valor=:valor";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':inicio', $this->inicio, PDO::PARAM_STR);
		$stmt->bindParam(':seguradora', $this->seguradora, PDO::PARAM_STR);
		$stmt->bindParam(':valor', $this->valor, PDO::PARAM_STR);
		
		if($stmt->execute()){
			return true;
		}
 
		return false;
	}
	
}

?>
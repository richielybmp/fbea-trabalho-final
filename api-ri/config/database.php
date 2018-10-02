<?php

class Database {
	public $conn;
	public $table_ingressos = "ingressos";
    public function __construct() {
		$this->conn = new SQLite3('../ri.sqlite', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);
		$this->create_table_ingressos();
	}
	
	public function create_table_ingressos(){
		$this->conn->query('CREATE TABLE IF NOT EXISTS "'.$this->table_ingressos.'" (
					"id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
					"id_filme" INTEGER NOT NULL,
					"nome_filme" VARCHAR NOT NULL,
					"horario_filme" DATETIME NOT NULL,
					"sala" VARCHAR NOT NULL,
					"quantidade_ingressos" INTEGER NOT NULL,
					"valor_total" NUMERIC NOT NULL
				)');
	}
}

?>
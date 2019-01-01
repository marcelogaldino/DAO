<?php

class Sql extends PDO {

	private $conn;

	public function __construct() {

		$this->conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root", "");

	}


	private function setParams($statement, $parameters = array()) {

		foreach ($parameters as $key => $value) {
			
			$this->setParam($key, $value);

		}

	}

	private function setParam($statement, $key, $value) {

		$statement->bindParam($key, $value);

	}

	// esta função recebe o 1º paramentro como a query que sera executada no prepare e 2º paramentro como o resultado
	public function query($rawQuery, $params = array()) {

		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

		return $stmt;

	}

	public function select($rawQuery, $params = array()):array {

		$stmt = $this->query($rawQuery, $params);

		return $stmt-> fetchAll(PDO::FETCH_ASSOC);
	}

}

?>
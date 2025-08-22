<<?php 
require_once_one __DIR__ . '/../config/db.php';

class FacturaModel{
	private $conn;

	public function __construct(){
		$database = new Database();
		$this->conn=$database->getConnection();
	}
}


 ?>
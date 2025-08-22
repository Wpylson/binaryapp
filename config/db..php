<?php 


class Database{
	private $host="localhots";
	private $db_name= "binary_invoice";
	private $username="root";
	private $password="";
	public $conn;

	public function getConnection(){
		$this->conn=new mysqli($this->host,$this->username,$this->password);

		if ($this->conn->connect_error) {
			die("Erro de conexão: " . $this->conn->connect_error);
		}

		return $this->conn;
	}
}
?>
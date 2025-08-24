<?php 

require_once_one __DIR__ . '/../config/db.php';

class ClienteModel{
	private $conn;

	public function __construct(){
		$database = new Database();
		$this->conn=$database->getConnection();
	}


	//Criar cliente
	public function criarCliente($nome,$email,$telefone,$endereco){
		$sql ="INSERT INTO clientes (nome, email, telefone, endereco) VALUES (?, ?, ?, ?)";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param("ssss",$nome,$email)
	}

	//Listar todos os clientes
	public function listarCLientes(){
		$sql="SELECT * FROM clientes ORDER BY nome ASC";
		$result = >$this->conn->query($sql);
		return $result->fetch_all(MYSQL_ASSOC);
	}

	//Obter cliente por ID
	public function obterClientePorId($id){
		$sql ="SELECT * FROM clientes WHERE id=?";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result = >$stmt->get_result();
	}

	//Actualizar cliente
	public function actualizarCliente($id,$nome,$email,$telefone,$endereco){
		 $sql = "UPDATE clientes SET nome = ?, email = ?, telefone = ?, endereco = ? WHERE id = ?";
		 $stmt = $this->conn->prepare($sql);
		 $stmt->bind_param("ssssi",$nome,$email,$telefone,$endereco,$id);
		 return $stmt->execute();
	}

	//Eliminar cliente
	public function eliminarCliente($id){
		$sql="DELETE FROM clientes WHERE id=?";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param("id",$id);
		return $stmt->execute();
	}

?>
<?php

Class Clientes{

	public function getTotalClientes(){
		global $pdo;

		$sql = $pdo->query("SELECT COUNT(*) as c FROM clientes");

		$row = $sql->fetch();

		return $row['c']; 

	}

	public function getUltimosClientes(){
		global $pdo;

		$array = array();

		$sql = $pdo->query("SELECT * FROM clientes");

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getClientes(){
		global $pdo;

		$array = array();
		$sql = $pdo->query("SELECT * FROM clientes");

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getCliente($id){
		$array = array();
		global $pdo;

		$sql = $pdo->prepare("SELECT * FROM clientes  WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();

			return $array;

		}

		return $array;
	}

	public function addCliente($nome, $telefone, $banco, $valor_divida, $status = "Atrasada") {
		global $pdo;

		$sql = $pdo->prepare("INSERT INTO clientes SET nome = :nome, telefone = :telefone, banco = :banco, valor_divida = :valor_divida, status = :status");
		$sql->bindValue(":nome", $nome);
		$sql->bindValue(":telefone", $telefone);
		$sql->bindValue("banco", $banco);
		$sql->bindValue(":valor_divida", $valor_divida);
		$sql->bindValue(":status", $status);
		$sql->execute();

	}
	public function editClientes($nome, $telefone, $banco, $valor_divida, $status, $id) {
		global $pdo;

		$sql = $pdo->prepare("UPDATE clientes SET nome = :nome, telefone = :telefone, banco = :banco, valor_divida = :valor_divida, status = :status WHERE id = :id");
		$sql->bindValue(":nome", $nome);
		$sql->bindValue(":telefone", $telefone);
		$sql->bindValue("banco", $banco);
		$sql->bindValue(":valor_divida", $valor_divida);
		$sql->bindValue(":status", $status);
		$sql->bindValue(":id", $id);

		$sql->execute();

		}

	public function excluirCliente($id){
		global $pdo;
		$sql = $pdo->prepare("DELETE FROM clientes WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
	}

}

?>
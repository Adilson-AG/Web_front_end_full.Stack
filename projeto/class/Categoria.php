<?php

include_once 'Conectar.php';

/**
 * 
 */
class Categoria{
	private $id;
	private $descricao;
	private $conn;

	function getId(){
		return $this->id;
	}
	function getDescricao(){
		return $this->descricao;
	}
	function setId ($id) {
	 $this->id = $id;
	}
	function setDescricao ($descricao){
		 $this->descricao = $descricao;
	}
	
	function listar(){
		try {
			$this->conn = new Conectar();
			$sql = "SELECT * FROM categoria";
			$executar = $this->conn->prepare($sql);

			if($executar->execute() == 1){
				return $executar->fetchALL();
			}else{
				return false;
			}

			
		} catch (PDOException $e) {
			echo $e-> getMessage();
		}
	}
	function excluir(){
		try {
			$this->conn = new Conectar();
			$sql = "DELETE FROM categoria WHERE id=?";
			$executar = $this->conn->prepare($sql);
            $executar->bindValue(1,$this->id, PDO::PARAM_INT);

			if($executar->execute() == 1){
				return "Deletado com sucesso";
			}else{
				return "Erro ao excluir";
			}

			
		} catch (PDOException $e) {
			echo $e-> getMessage();
		}
	}

	function salvar(){
try {
			$this->conn = new Conectar();
			$sql = "INSERT INTO categoria VALUES (null,?)";
			$executar = $this->conn->prepare($sql);
            $executar->bindValue(1,$this->descricao, PDO::PARAM_STR);

			if($executar->execute() == 1){
				return "Cadastrado com sucesso";
			}else{
				return "Erro ao salvar";
			}

			
		} catch (PDOException $e) {
			echo $e-> getMessage();
		}
	}


}

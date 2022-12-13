<?php
	require_once 'classDatabase.php';
	
	abstract class CRUD extends Database{
		
		protected $table = 'usuario';
		private $siape;
		protected $buscar;

		//abstract public function insert();
		//abstract public function update($id);
		
		public function  find($siape){
			$sql = "SELECT * FROM $this->table WHERE siape = :siape";
			$stmt = Database::prepare($sql);
			$stmt->bindParam(':siape', $siape, PDO::PARAM_INT);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_BOTH);
		}
		
		public function  findAll(){
			$sql = "SELECT * FROM $this->table ";
			$stmt = Database::prepare($sql);			
			$stmt->execute();

			return $stmt->fetchAll(PDO::FETCH_BOTH );
		}

		public function busca($pesquisar){
			$sql="SELECT * FROM $this->table WHERE $this->buscar ILIKE :pesquisar";
			$stmt = Database::prepare($sql);	
			$stmt->bindParam(':pesquisar', $pesquisar);
			$stmt->execute();

			return $stmt->fetchAll(PDO::FETCH_BOTH );
		}
	}
?>
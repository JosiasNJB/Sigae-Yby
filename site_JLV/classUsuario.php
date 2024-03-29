<?php

    require_once 'conexao.php';
    require_once 'classCrud.php';
    include_once 'classDatabase.php';
           
    class Usuario extends CRUD{

        protected $table ='usuario';
	
        private $siape;
        private $nome;
        private $senha;
        private $email;
        private $tel;

        public function setSiape($siape){
            $this->siape = $siape;
        }
        public function getSiape(){
            return $this->siape;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }
        public function getNome(){
            return $this->nome;
        }

        public function setTel($tel){
            $this->tel = $tel;
        }
        public function getTel(){
            return $this->tel;
        }

        public function setEmail($email){
            $this->email = $email;
        }
        public function getEmail(){
            return $this->email;
        }
        
        public function setSenha($senha){
            $this->senha = $senha;
        }
        public function getSenha(){
            return $this->senha;
        }

        public function login() {
            $sql = "SELECT * FROM usuario WHERE siape = :siape and senha = :senha";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(":siape", $this->siape);
            $stmt->bindParam(":senha", $this->senha);
            $stmt->execute();

            return $stmt->fetch();
        }

        public function insertuser(){
            $sql="INSERT INTO $this->table (siape, nome, email, senha, telefone) VALUES (:siape,:nome,:email,:senha,:tel)";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':siape', $this->siape);
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':tel', $this->tel);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':senha', $this->senha);

            return $stmt->execute();
        }

        public function update($siape){
            $sql="UPDATE $this->table SET nome = :nome, email = :email , senha = :senha , telefone = :tel WHERE siape = :siape ";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':senha', $this->senha);
            $stmt->bindParam(':tel', $this->tel);
            $stmt->bindParam(':siape', $siape, PDO::PARAM_INT);
            return $stmt->execute();
        }

    }

?>
<?php
    class Aluno extends CRUD{

        public function setSiape($siape){
            $this->senha = $senha;
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
            $sql = "SELECT * FROM pessoa WHERE email = :email and senha = :senha";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":senha", $this->senha);
            $stmt->execute();

            return $stmt->fetch();
        }

        public function insert(){
            $sql="INSERT INTO $this->table (nome, matricula, email, senha) VALUES (:nome,:matricula,:email,:data_nasc,:senha)";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':matricula', $this->matricula;)
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':senha', $this->senha);

            return $stmt->execute();
        }

    }

?>
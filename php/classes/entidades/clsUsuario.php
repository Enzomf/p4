<?php

    class Usuario  { 

        private $id;
        private $nome;
        private $email;
        private $senha; 
        private $cargo;
    
        public function __construct($nome, $email, $senha, $cargo) {
            $this->nome = $nome;
            $this->email = $email;
            $this->cargo = $cargo;
            
        }  


        public function getNome() { 
            return $this->nome;
        }


        public function setNome($nome) { 
            $this->nome = $nome;
        }
        public function setCargo($cargo) { 
            $this->cargo = $cargo;
        }
        public function getCargo() { 
            return $this->cargo;
        }


        public function getEmail() { 
            return $this->email;
        }

        public function setEmail($email) { 
            $this->email = $email;
        }

        public function setSenha($senha) {
            $this->senha = $senha;
        }

        public function getSenha() {  
            return $this->senha;           
        }

    }
?>
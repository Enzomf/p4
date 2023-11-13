<?php
    class HashService { 

        private $hashOptions = [
            'cost' => 12,
        ];

        public function hash($senha)  { 

            $hashSenha = password_hash($senha, PASSWORD_BCRYPT, $hashOptions);

            return $hashSenha;
        }

        public function verificarSenha($senha, $hashSenha) { 
            
            $isHashValido = password_verify($senha, $hashSenha);

            return $isHashValido;

        }


    }

?>
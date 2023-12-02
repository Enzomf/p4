<?php

require_once __DIR__ . '/../entidades/Usuario.php';

class UsuarioRepo
{


    private PDO $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function findByEmail($email)
    {

        $query = "SELECT id, nome, email FROM USUARIOS WHERE email=:email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);

        $stmt->execute();


        $resultado = $stmt->fetch();

        if ($resultado === false) {
            return null;
        }

        $usuario = new Usuario(
            $resultado->id,
            $resultado->nome,
            null,
            $resultado->email,
        );

        return $usuario;
    }

    public function create(Usuario $usuario): void
    {

        $query = "INSERT INTO USUARIOS (nome, email, senha)  VALUES (:nome, :email, :senha)";
        $stmt = $this->conn->prepare($query);

        $nome = $usuario->getNome();
        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();

        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":senha", $senha);


        $stmt->execute();
    }
}

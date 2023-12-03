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

        $query = "SELECT id, nome, email, senha FROM USUARIOS WHERE email=:email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);

        $stmt->execute();


        $resultado = $stmt->fetch();

        if ($resultado === false) {
            return null;
        }

        $usuario = new Usuario(
            $resultado['id'],
            $resultado['nome'],
            $resultado['senha'],
            $resultado['email']
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

    public function findAll()
    {
        $query = 'SELECT nome, email, id FROM USUARIOS';

        $stmt = $this->conn->query($query);

        $resultados = $stmt->fetchAll();

        $usuarios = [];

        foreach ($resultados as $resultado) {

            $usuario = new Usuario(
                $resultado['id'],
                $resultado['nome'],
                null,
                $resultado['email']

            );
            array_push($usuarios, $usuario);
        }

        return $usuarios;
    }

    public function delete($id)
    {
        $query = "DELETE FROM USUARIOS WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
    }

    public function findById($id)
    {

        $query = 'SELECT nome, email, id FROM USUARIOS WHERE id =:id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);

        $stmt->execute();

        $resultado = $stmt->fetch();

        if ($resultado === false) {
            return null;
        }
        $usuario = new Usuario(
            $resultado['id'],
            $resultado['nome'],
            null,
            $resultado['email']
        );

        return $usuario;
    }


    public function update($id, $nome, $email)
    {
        $query = 'UPDATE USUARIOS SET email=:email, nome=:nome WHERE id=:id';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':id', $id);


        $stmt->execute();
    }
}

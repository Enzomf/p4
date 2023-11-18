<?php

class UsuarioRepo
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function listarTodos()
    {


        $sql = "SELECT nome, email, id FROM usuarios";
        $resultado = $this->conexao->query($sql);
        $usuarios = [];
        while ($usuario = $resultado->fetch_object()) {
            $usuarios[] = $usuario;
        }
        return $usuarios;

    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function inserir(Usuario $usuario)
    {

        $nome = $usuario->getNome();
        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();


        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bind_param('sss', $nome, $email, $senha);

        if (!$stmt) {
            die('Error preparing statement: ' . $this->conexao->error);
        }
        $stmt->execute();

        if ($stmt->error) {
            die('Error executing statement: ' . $stmt->error);
        }
    }


    public function atualizar($id, $usuario)
    {
        $sql = "UPDATE usuarios SET nome = :nome, email = :email, senha = :senha WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $usuario['nome']);
        $stmt->bindParam(':email', $usuario['email']);
        $stmt->bindParam(':senha', $usuario['senha']);
        $stmt->execute();
        return $this->buscarPorId($id);
    }

    public function deletar($id)
    {
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    public function buscarPorEmail($email)
    {
        $sql = 'SELECT nome, email, id FROM usuarios WHERE email=?';
        $stmt = $this->conexao->prepare($sql);

        $stmt->bind_param('s', $email);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
?>
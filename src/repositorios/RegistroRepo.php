<?php

require_once __DIR__ . '/../entidades/Registro.php';

class RegistroRepo
{
    private PDO $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function create(Registro $registro): void
    {
        $query = "INSERT INTO REGISTROS (nome, telefone, data_nascimento, deficiencia) VALUES (:nome, :telefone, :data_nascimento, :deficiencia)";
        $stmt = $this->conn->prepare($query);

        $nome = $registro->getNome();
        $telefone = $registro->getTelefone();
        $deficiencia  = $registro->getDeficiencia();
        $data_nascimento = $registro->getDataNascimento();

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':data_nascimento', $data_nascimento);
        $stmt->bindParam(':deficiencia', $deficiencia);

        $stmt->execute();
    }

    public function findAll()
    {
        $query = 'SELECT nome, id, telefone, deficiencia, data_nascimento FROM REGISTROS';

        $stmt = $this->conn->query($query);

        $resultados = $stmt->fetchAll();

        $registros = [];

        foreach ($resultados as $resultado) {
            $registro = new Registro(
                $resultado['id'],
                $resultado['nome'],
                $resultado['telefone'],
                $resultado['deficiencia'],
                $resultado['data_nascimento'],
            );
            array_push($registros, $registro);
        }

        return $registros;
    }

    public function delete($id)
    {
        $query = "DELETE FROM REGISTROS WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
    }

    public function findById($id)
    {
        $query = 'SELECT nome, telefone, id, deficiencia, data_nascimento FROM REGISTROS WHERE id =:id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);

        $stmt->execute();

        $resultado = $stmt->fetch();

        if ($resultado === false) {
            return null;
        }

        $usuario = new Registro(
            $resultado['id'],
            $resultado['nome'],
            $resultado['telefone'],
            $resultado['deficiencia'],
            $resultado['data_nascimento'],
        );

        return $usuario;
    }

    public function update($id, $nome, $telefone, $deficiencia, $data_nascimento)
    {
        $query = 'UPDATE USUARIOS SET nome=:nome, telefone=:telefone, deficiencia=:deficiencia, data_nascimento=:data_nascimento WHERE id=:id';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':deficiencia', $deficiencia);
        $stmt->bindParam(':data_nascimento', $data_nascimento);


        $stmt->execute();
    }
}

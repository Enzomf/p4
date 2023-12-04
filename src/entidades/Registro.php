<?php


class Registro
{
    private  $id;
    private  $nome;
    private  $telefone;
    private  $deficiencia;
    private $data_nascimento;

    public function __construct($id = null, $nome, $telefone, $deficiencia, $data_nascimento)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->deficiencia = $deficiencia;
        $this->data_nascimento = $data_nascimento;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getTelefone(): int
    {
        return $this->telefone;
    }

    public function setTelefone(int $telefone): void
    {
        $this->telefone = $telefone;
    }

    public function getDeficiencia(): string
    {
        return $this->deficiencia;
    }

    public function setDeficiencia(string $deficiencia): void
    {
        $this->deficiencia = $deficiencia;
    }

    public function getDataNascimento()
    {
        return $this->data_nascimento;
    }

    public function setDataNascimento($data_nascimento): void
    {
        $this->data_nascimento = $data_nascimento;
    }
}

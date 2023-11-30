<?php

namespace Entidades;

use Entidades\Usuario;

class Registro
{
    private int $id;
    private string $nome;
    private int $telefone;
    private string $deficiencia;
    private $data_nascimento;
    private Usuario $adicionado_por;
    private $created_at;
    private $updated_at;

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

    public function getAdicionadoPor(): Usuario
    {
        return $this->adicionado_por;
    }

    public function setAdicionadoPor(Usuario $adicionado_por): void
    {
        $this->adicionado_por = $adicionado_por;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }



}
?>
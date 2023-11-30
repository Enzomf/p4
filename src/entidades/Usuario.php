<?php

namespace Entidades;

class Usuario
{

    private int $id;
    private string $nome;
    private string $senha;
    private string $email;

    private array $registros;

    public function __construct(int $id = null, string $nome = null, string $senha = null, string $email = null, array $registros = null)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->senha = $senha;
        $this->email = $email;
        $this->registros = $registros;

    }




    public function getId(): int
    {
        return $this->id;
    }
    public function getNome(): string
    {
        return $this->nome;
    }
    public function getSenha(): string
    {
        return $this->senha;
    }
    public function getEmail(): string
    {
        return $this->email;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    public function setSenha(string $senha)
    {
        $this->senha = $senha;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }


}

?>
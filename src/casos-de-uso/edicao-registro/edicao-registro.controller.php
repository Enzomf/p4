<?php

require_once './edicao-registro.caso-de-uso.php';

class EdicaoRegistroController
{
    private $edicaoRegistroCasoDeUso;

    public function __construct(EdicaoRegistroCasoDeUso $edicaoRegistroCasoDeUso)
    {
        $this->edicaoRegistroCasoDeUso = $edicaoRegistroCasoDeUso;
    }
    public function handle()
    {
        $nome = $_POST['nome'];
        $id = $_POST['id'];
        $telefone = $_POST['telefone'];
        $data_nascimento = $_POST['data_nascimento'];
        $deficiencia = $_POST['deficiencia'];




        $this->edicaoRegistroCasoDeUso->execute($id, $telefone, $data_nascimento, $nome, $deficiencia);
    }
}

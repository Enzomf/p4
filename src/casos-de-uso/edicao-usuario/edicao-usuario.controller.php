<?php

require_once './edicao-usuario.caso-de-uso.php';

class EdicaoUsuarioController
{
    private $edicaoUsuarioCasoDeUso;

    public function __construct(EdicaoUsuarioCasoDeUso $edicaoUsuarioCasoDeUso)
    {
        $this->edicaoUsuarioCasoDeUso = $edicaoUsuarioCasoDeUso;
    }
    public function handle()
    {
        $email = $_POST['email'];
        $nome = $_POST['nome'];
        $id = $_POST['id'];




        $this->edicaoUsuarioCasoDeUso->execute($id, $nome, $email);
    }
}

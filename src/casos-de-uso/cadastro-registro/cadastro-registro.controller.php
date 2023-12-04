<?php

require_once './cadastro-registro.caso-de-uso.php';
require_once '../../constants.php';

class CadastroRegistroController
{
    private $cadastroUsuarioCasoDeUso;

    public function __construct(CadastroRegistroCasoDeUso $cadastroUsuarioCasoDeUso)
    {
        $this->cadastroUsuarioCasoDeUso = $cadastroUsuarioCasoDeUso;
    }
    public function handle()
    {
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $deficiencia = $_POST['deficiencia'];
        $data_nascimento = $_POST['data_nascimento'];


        $this->cadastroUsuarioCasoDeUso->execute(
            $nome,
            $telefone,
            $deficiencia,
            $data_nascimento
        );
    }
}

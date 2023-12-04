<?php

require_once '../../constants.php';
require_once '../../repositorios/RegistroRepo.php';

class CadastroRegistroCasoDeUso
{

    private RegistroRepo $registroRepo;

    public function __construct(RegistroRepo $registroRepo)
    {
        $this->registroRepo = $registroRepo;
    }

    public function execute($nome, $telefone, $deficiencia, $data_nascimento)
    {

        $registro = new Registro(
            null,
            $nome,
            $telefone,
            $deficiencia,
            $data_nascimento
        );

        $this->registroRepo->create($registro);


        header("Location:" . ROOT_PATH . "\lista-registros.php");
    }
}

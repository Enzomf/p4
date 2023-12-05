<?php

require_once '../../repositorios/RegistroRepo.php';
require_once '../../constants.php';


class EdicaoRegistroCasoDeUso
{

    private $registroRepo;

    public function __construct(RegistroRepo $registroRepo)
    {
        $this->registroRepo = $registroRepo;
    }

    public function execute($id, $telefone, $data_nascimento, $nome, $deficiencia)
    {


        $usuario = $this->registroRepo->findById($id);

        if ($usuario === null) {
            header("Location: " . ROOT_PATH . "/lista-registros.php?error=Usuario não encontrado");
            return;
        };

        $this->registroRepo->update($id, $nome, $telefone, $deficiencia, $data_nascimento);

        header("Location:" . ROOT_PATH . "/lista-registros.php?success=Dados atualizados com sucesso");
    }
}

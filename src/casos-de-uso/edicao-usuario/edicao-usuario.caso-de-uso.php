<?php

require_once '../../repositorios/UsuarioRepo.php';
require_once '../../constants.php';


class EdicaoUsuarioCasoDeUso
{

    private $usuarioRepo;

    public function __construct(UsuarioRepo $usuarioRepo)
    {
        $this->usuarioRepo = $usuarioRepo;
    }

    public function execute($id, $nome, $email)
    {


        $usuario = $this->usuarioRepo->findById($id);

        if ($usuario === null) {
            header("Location: " . ROOT_PATH . "/index.php?error=Usuario não encontrado");
            return;
        };

        $this->usuarioRepo->update($id, $nome, $email);

        header("Location:" . ROOT_PATH . "/index.php?success=Dados atualizados com sucesso");
    }
}

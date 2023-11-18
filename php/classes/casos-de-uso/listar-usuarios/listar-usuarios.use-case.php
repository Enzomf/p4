<?php

include_once(__DIR__ . '/../../repositorios/clsUsuarioRepo.php');
class ListarUsuariosUseCase
{
    private UsuarioRepo $usuarioRepo;

    public function __construct(
        UsuarioRepo $usuarioRepo
    ) {

        $this->usuarioRepo = $usuarioRepo;
    }



    public function execute()
    {

        $usuarios = $this->usuarioRepo->listarTodos();

        return $usuarios;
    }
}


?>
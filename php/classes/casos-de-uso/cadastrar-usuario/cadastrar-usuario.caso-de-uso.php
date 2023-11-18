<?php

include_once '../../repositorios/index.php';
include_once '../../serviços/index.php';
include_once '../../entidades/index.php';


class CadastrarUsuarioCasoDeUso
{

    private $usuarioRepo;
    private $hashService;

    public function __construct(
        UsuarioRepo $usuarioRepo,
        HashService $hashService
    ) {
        $this->usuarioRepo = $usuarioRepo;
        $this->hashService = $hashService;
    }

    public function execute($nome, $email, $senha)
    {
        $hashSenha = $this->hashService->hash($senha);

        $emailJaCadastrado = $this->usuarioRepo->buscarPorEmail($email);

        if (!empty($emailJaCadastrado)) {
            echo 'e-mail já cadastrado';
            return;
        }

        $usuario = new Usuario($nome, $email, $hashSenha);

        $this->usuarioRepo->inserir($usuario);

        header('Location: /users');

    }


}


?>
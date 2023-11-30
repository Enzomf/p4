<?php

use Servicos\HashService;
use Repositorios\UsuarioRepo;
use Entidades\Usuario;

class CadastroUsuarioCasoDeUso
{

    public function __construct(
        private HashService $hashService,
        private UsuarioRepo $usuarioRepo
    ) {
    }

    public function execute($nome, $senha, $email)
    {

        $hashSenha = $this->hashService->hash($senha);


        $usuarioExiste = $this->usuarioRepo->findByEmail($email);

        if ($usuarioExiste !== null) {
            echo 'E-mail já cadastrado';
            return;
        }
        ;

        $usuario = new Usuario(
            null,
            $nome,
            $hashSenha,
            $email
        );


        $this->usuarioRepo->create($usuario);




    }
}

?>
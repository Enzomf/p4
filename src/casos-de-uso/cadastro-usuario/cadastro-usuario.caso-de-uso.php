<?php

require_once '../../repositorios/UsuarioRepo.php';
require_once '../../servicos/Hash.php';

class CadastroUsuarioCasoDeUso
{

    private $hashService;
    private $usuarioRepo;

    public function __construct(HashService $hashService, UsuarioRepo $usuarioRepo)
    {
        $this->hashService = $hashService;
        $this->usuarioRepo = $usuarioRepo;
    }

    public function execute($nome, $senha, $email)
    {

        $hashSenha = $this->hashService->hash($senha);


        $usuarioExiste = $this->usuarioRepo->findByEmail($email);

        if ($usuarioExiste !== null) {
            header("Location: /cadastro.php?error=E-mail já cadastrado");
            return;
        };

        $usuario = new Usuario(
            null,
            $nome,
            $hashSenha,
            $email
        );


        $this->usuarioRepo->create($usuario);
    }
}

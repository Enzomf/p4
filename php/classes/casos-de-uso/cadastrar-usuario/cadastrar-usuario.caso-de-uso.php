<?php

include_once '../../repositorios';
include_once '../../serviços';
include_once '../../entidades';


class CadastrarUsuarioCasoDeUso
{

    private $usuarioRepo;
    private $hashService;

    public function __construct(
        UsuarioRepo $usuarioRepo,
        HashService $hashService,
    ) {
        $this->usuarioRepo = $usuarioRepo;
        $this->hashService = $hashService;
    }

    public function execute($nome, $email, $senha)
    {
        $hashSenha = $this->hashService->hash($senha);


        $usuario = new Usuario($nome, $email, $hashSenha);

        $this->usuarioRepo->inserir($usuario);

    }


}


?>
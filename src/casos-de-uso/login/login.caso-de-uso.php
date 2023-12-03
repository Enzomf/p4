<?php
session_start();
$_SESSION['autenticado'] = false;


require_once '../../repositorios/UsuarioRepo.php';
require_once '../../servicos/Hash.php';
require_once '../../constants.php';
class LoginCasoDeUso
{

    private HashService $hashService;
    private UsuarioRepo $usuarioRepo;

    public function __construct(HashService $hashService, UsuarioRepo $usuarioRepo)
    {
        $this->hashService = $hashService;
        $this->usuarioRepo = $usuarioRepo;
    }

    function execute($email, $senha)
    {
        $usuario = $this->usuarioRepo->findByEmail($email);


        if ($usuario === null) {
            header("Location:" . ROOT_PATH . "\login.php?error=E-mail ou senha inválidos");
            return;
        }

        $senhaUsuario = $usuario->getSenha();

        $senhaEvalida = $this->hashService->verificarSenha($senha, $senhaUsuario);

        if ($senhaEvalida === false) {
            header("Location:" . ROOT_PATH . "/login.php?error=E-mail ou senha inválidos");
            return;
        }

        $_SESSION['autenticado'] = true;
        $_SESSION['nome'] = $usuario->getNome();
        $_SESSION['email'] = $usuario->getEmail();
        $_SESSION['id'] = $usuario->getId();


        header("Location:" . ROOT_PATH . "/index.php");
    }
}

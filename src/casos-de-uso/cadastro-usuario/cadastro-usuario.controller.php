<?php

require_once './cadastro-usuario.caso-de-uso.php';
require_once '../../constants.php';

class CadastroUsuarioController
{
    private $cadastroUsuarioCasoDeUso;

    public function __construct(CadastroUsuarioCasoDeUso $cadastroUsuarioCasoDeUso)
    {
        $this->cadastroUsuarioCasoDeUso = $cadastroUsuarioCasoDeUso;
    }
    public function handle()
    {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $confirmacaoSenha = $_POST['confirmacaoSenha'];
        $nome = $_POST['nome'];


        if ($senha !== $confirmacaoSenha) {
            header("Location:" . ROOT_PATH . "/cadastro.php?error=As senhas não conferem");
            return;
        }


        $this->cadastroUsuarioCasoDeUso->execute($nome, $senha, $email);
    }
}

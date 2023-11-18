<?php

include_once './cadastrar-usuario.caso-de-uso.php';
class CadastrarUsuarioController
{
    private $cadastrarUsuarioCasoDeUso;

    public function __construct(CadastrarUsuarioCasoDeUso $cadastrarUsuarioCasoDeUso)
    {
        $this->cadastrarUsuarioCasoDeUso = $cadastrarUsuarioCasoDeUso;
    }

    public function handle()
    {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $confirmacaoSenha = $_POST['confirmacaoSenha'];

        if (!$nome) {
            echo ('O nome é obrigatório');
            return;
        }
        if (!$email) {
            echo ('O e-mail é obrigatório');
            return;
        }

        if (!$senha) {
            echo ('A senha é obrigatória');
            return;
        }
        if (!$confirmacaoSenha) {
            echo ('A confirmação da senha é obrigatória');
            return;
        }


        if ($senha !== $confirmacaoSenha) {

            echo ('As senhas não conferem');
            return;
        }

        $this->cadastrarUsuarioCasoDeUso->execute($nome, $email, $senha);

    }
}




?>
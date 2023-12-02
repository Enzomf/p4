<?php

require_once './cadastro-usuario.caso-de-uso.php';
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


        if (!isset($email) || !isset($senha) || !isset($nome) || !isset($confirmacaoSenha)) {
            header("Location: /cadatro.php?error=Dados Incompletos");
            return;
        }

        if ($senha !== $confirmacaoSenha) {
            echo "As senhas não conferem";
            return;
        }


        $this->cadastroUsuarioCasoDeUso->execute($nome, $email, $senha);

        echo "Usuario cadastrado com sucesso";
    }
}

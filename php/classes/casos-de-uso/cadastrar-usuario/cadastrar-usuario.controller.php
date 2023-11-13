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

        if ($senha !== $confirmacaoSenha) {

            throw new Error('As senhas não conferem');
        }

        $this->cadastrarUsuarioCasoDeUso->execute($nome, $email, $senha);
        ;
    }
}




?>
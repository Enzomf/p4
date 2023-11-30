<?php
class CadastroUsuarioController
{
    public function __construct(
        private CadastroUsuarioCasoDeUso $cadastroUsuarioCasoDeUso
    ) {
    }

    public function handle()
    {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $confirmacaoSenha = $_POST['confirmacaoSenha'];
        $nome = $_POST['nome'];


        if (empty($email) || empty($senha) || empty($nome) || empty($confirmacaoSenha)) {
            echo "Dados incompletos!";
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

?>
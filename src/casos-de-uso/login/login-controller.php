<?php

require_once './login.caso-de-uso.php';
require_once '../../constants.php';

class LoginController
{

    private LoginCasoDeUso $loginCasoDeUso;

    public function __construct(LoginCasoDeUso $loginCasoDeUso)
    {
        $this->loginCasoDeUso = $loginCasoDeUso;
    }


    public function handle()
    {
        $email = $_POST['email'];
        $senha = $_POST['senha'];


        $this->loginCasoDeUso->execute($email, $senha);
    }
}

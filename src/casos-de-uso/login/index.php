<?php
require_once '../../repositorios/UsuarioRepo.php';
require_once '../../servicos/Hash.php';
require_once './login-controller.php';
require_once  './login.caso-de-uso.php';
require_once   '../../servicos/DB.php';

$hashService = new HashService();
$dbService = new DBService();
$usuarioRepo = new UsuarioRepo($dbService->getConn());

$loginCasoDeUso = new LoginCasoDeUso($hashService, $usuarioRepo);
$loginController = new LoginController($loginCasoDeUso);


$loginController->handle();

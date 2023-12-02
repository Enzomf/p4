<?php

require_once '../../repositorios/UsuarioRepo.php';
require_once '../../servicos/Hash.php';
require_once '../../servicos/DB.php';
require_once './cadastro-usuario.caso-de-uso.php';
require_once './cadastro-usuario.controller.php';

$dbService = new DBService();


$usuarioRepo = new UsuarioRepo($dbService->getConn());
$hashService = new HashService();

$cadastroUsuarioUseCase = new CadastroUsuarioCasoDeUso($hashService, $usuarioRepo);

$cadastroUsuarioController = new CadastroUsuarioController($cadastroUsuarioUseCase);

$cadastroUsuarioController->handle();

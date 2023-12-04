<?php

require_once '../../repositorios/RegistroRepo.php';
require_once '../../servicos/DB.php';
require_once './cadastro-registro.caso-de-uso.php';
require_once './cadastro-registro.controller.php';
$dbService = new DBService();


$registroRepo = new RegistroRepo($dbService->getConn());

$cadastroUsuarioUseCase = new CadastroRegistroCasoDeUso($registroRepo);

$cadastroRegistroController = new CadastroRegistroController($cadastroUsuarioUseCase);

$cadastroRegistroController->handle();

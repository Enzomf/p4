<?php

require_once '../../repositorios/UsuarioRepo.php';
require_once '../../servicos/DB.php';
require_once './edicao-usuario.caso-de-uso.php';
require_once './edicao-usuario.controller.php';

$dbService = new DBService();


$usuarioRepo = new UsuarioRepo($dbService->getConn());

$edicaoUsuarioUseCase = new EdicaoUsuarioCasoDeUso($usuarioRepo);

$edicaoUsuarioController = new EdicaoUsuarioController($edicaoUsuarioUseCase);

$edicaoUsuarioController->handle();

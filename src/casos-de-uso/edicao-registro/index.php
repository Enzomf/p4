<?php

require_once '../../repositorios/RegistroRepo.php';
require_once '../../servicos/DB.php';
require_once './edicao-registro.caso-de-uso.php';
require_once './edicao-registro.controller.php';

$dbService = new DBService();


$usuarioRepo = new RegistroRepo($dbService->getConn());

$edicaoRegistro = new EdicaoRegistroCasoDeUso($usuarioRepo);

$edicaoRegistroController = new EdicaoRegistroController($edicaoRegistro);

$edicaoRegistroController->handle();

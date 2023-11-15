<?php
include_once('cadastrar-usuario.caso-de-uso.php');
include_once('cadastrar-usuario.controller.php');
include_once '../../repositorios/index.php';
include_once('../../serviços/index.php');


$conn = new Conn();

$usuarioRepo = new UsuarioRepo($conn->getConnection());
$hashService = new HashService();

$cadastrarUsuarioController = new CadastrarUsuarioCasoDeUso($usuarioRepo, $hashService);
$cadastrarUsuarioController = new CadastrarUsuarioController($cadastrarUsuarioController);

$cadastrarUsuarioController->handle();

?>
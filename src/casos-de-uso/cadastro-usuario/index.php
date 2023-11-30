<?php

require_once '../../repositorios/UsuarioRepo.php';
require_once '../../servicos/Hash.php';
require_once '../../servicos/DB.php';


use Repositorios\UsuarioRepo;
use Servicos\HashService;


$usuarioRepo = new UsuarioRepo($conexao);
$hashService = new HashService();

$cadastroUsuarioUseCase = new CadastroUsuarioCasoDeUso($hashService, $usuarioRepo);

$cadastroUsuarioController = new CadastroUsuarioController($cadastroUsuarioUseCase);

$cadastroUsuarioController->handle();

?>
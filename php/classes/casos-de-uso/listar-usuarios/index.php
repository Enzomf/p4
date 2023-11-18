<?php
include_once('listar-usuarios.use-case.php');
include_once __DIR__ . '/../../repositorios/index.php';
include_once __DIR__ . '/../../serviços/Conn.php';



function getListarUsuariosUsCaseInstance()
{
    $conn = new Conn();
    $repoUsuarios = new UsuarioRepo($conn->getConnection());
    $listarUsuariosUseCase = new ListarUsuariosUseCase($repoUsuarios);

    return $listarUsuariosUseCase;
}

?>
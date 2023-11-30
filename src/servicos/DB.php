<?php
$dsn = 'mysql:host=db;dbname=p4';
$usuario = 'p4';
$senha = 'p4';
$conexao;

try {
    $conexao = new PDO($dsn, $usuario, $senha);

    $sqlFolderBasePath = '../sql';

    $queryCreateTableUsuarios = file_get_contents("$sqlFolderBasePath/tabela-usuarios.sql");
    $queryCreateTableRegistros = file_get_contents("$sqlFolderBasePath/tabela-registros.sql");


    $conexao->exec($queryCreateTableUsuarios);
    $conexao->exec($queryCreateTableRegistros);


} catch (PDOException $e) {
    print_r($e->errorInfo);
}
?>  
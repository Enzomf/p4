<?php


function validaLogin()
{

    session_start();

    $autenticado = isset($_SESSION['autenticado']) ? $_SESSION['autenticado'] : null;

    if ($autenticado === false || $autenticado === null) {
        header('Location: /p4/login.php');
        return;
    }
}

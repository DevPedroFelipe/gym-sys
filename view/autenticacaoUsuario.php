<?php

session_start();

use src\RepositorioUsuario;

require_once '../src/RepositorioUsuario.php';

$login = $_POST['login'];
$senha = $_POST['senha'];

$RU = new RepositorioUsuario();
$retorno = $RU->autenticarUsuario($login, $senha);

if ($retorno) {
    
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
    header("location:../index.php");
    
} else {
    
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header("location:../view/loginUsuario.php?erro=1&login=".$login."");
}

?>
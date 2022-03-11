<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    
    require '../session.php';
    
}

use src\RepositorioUsuario;

require_once '../src/RepositorioUsuario.php';

$idUsuario = $_GET['idUsuario'];

$RU = new RepositorioUsuario();
$retorno = $RU->excluirUsuario($idUsuario);

if ($retorno) {
	header("location:../index.php?cod=4&c=1");

} else {
    header("location:../index.php?cod=10&idUsuario=".$idUsuario."&c=2");
}


?>
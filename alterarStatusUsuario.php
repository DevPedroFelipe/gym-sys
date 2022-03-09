<?php
/*
if (session_status() !== PHP_SESSION_ACTIVE) {
    
    require 'sessao.php';
    
}
*/

use src\RepositorioUsuario;

require_once 'src/RepositorioUsuario.php';

$idUsuario  = $_GET['idUsuario'];
$status     = $_GET['status'];

$RU = new RepositorioUsuario();
$retorno = $RU->alterarStatusUsuario($idUsuario, $status);

if ($retorno) {

    header('location:index.php?cod=4');
}

?>
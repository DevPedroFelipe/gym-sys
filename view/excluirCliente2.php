<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    
    require '../session.php';
    
}

use src\RepositorioCliente;

require_once '../src/RepositorioCliente.php';

$idCliente = $_GET['idCliente'];

$RC = new RepositorioCliente();
$retorno = $RC->excluirCliente($idCliente);

if ($retorno) {
	header("location:../index.php?cod=5&c=1");

} else {
    header("location:../index.php?cod=11&idCliente=".$idCliente."&c=2");
}


?>
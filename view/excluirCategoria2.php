<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    
    require '../session.php';
    
}

use src\RepositorioCategoria;

require_once '../src/RepositorioCategoria.php';

$idCategoria = $_GET['idCategoria'];

$RC = new RepositorioCategoria();
$retorno = $RC->excluirCategoria($idCategoria);

if ($retorno) {
	header("location:../index.php?cod=6&c=1");

} else {
    header("location:../index.php?cod=12&idCategoria=".$idCategoria."&c=2");
}


?>
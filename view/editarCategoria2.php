<?php

use src\Categoria;
use src\RepositorioCategoria;

require_once '../src/Categoria.php';
require_once '../src/RepositorioCategoria.php';

// Recebendo dados do form de cadastro de categoria
$idCategoria      = $_POST['idCategoria'];
$nome             = $_POST['nome'];
$descricao        = $_POST['descricao'];

// Instanciando classe Categoria
$Categoria = new Categoria();


// Efetuando set nos atributos da classe Categoria
$Categoria->setId($idCategoria);
$Categoria->setNome($nome);
$Categoria->setDescricao($descricao);

$RC = new RepositorioCategoria();

$retorno = $RC->alterarCategoria($Categoria);

if ($retorno) {

    header("location:../index.php?cod=9&c=1&idCategoria=" . $idCategoria);
} else {

    header("location:../index.php?cod=9&c=2&idCategoria=" . $idCategoria);
}

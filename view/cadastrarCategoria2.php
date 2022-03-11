<?php

use src\Categoria;
use src\RepositorioCategoria;

require_once '../src/Categoria.php';
require_once '../src/RepositorioCategoria.php';

// Recebendo dados do form de cadastro de categoria
$nome             = $_POST['nome'];
$descricao        = $_POST['descricao'];

// Instanciando classe Categoria
$Categoria = new Categoria();


// Efetuando set nos atributos da classe Categoria
$Categoria->setNome($nome);
$Categoria->setDescricao($descricao);

$RC = new RepositorioCategoria();

$retorno = $RC->cadastrarCategoria($Categoria);

if ($retorno) {

    header("location:../index.php?cod=3&c=1");
} else {

    header("location:../index.php?cod=3&c=2");
}

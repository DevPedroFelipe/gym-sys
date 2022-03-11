<?php

use src\Categoria;
use src\Cliente;
use src\RepositorioCliente;

require_once '../src/Categoria.php';
require_once '../src/Cliente.php';
require_once '../src/RepositorioCliente.php';

// Recebendo dados do form de cadastro de Cliente
$idCliente        = $_POST['idCliente'];
$idCategoria      = $_POST['categoria'];
$nome             = $_POST['nome'];
$dataNascimento   = $_POST['dataNascimento'];
$cpf              = $_POST['cpf'];
$sexo             = $_POST['sexo'];
$email            = $_POST['email'];
$telefone         = $_POST['telefone'];
$observacao       = $_POST['observacao'];

// Instanciando classe Cliente e Categoria
$Cliente = new Cliente();
$Categoria = new Categoria();

// Efetuando set nos atributos da classe Cliente
$Cliente->setId($idCliente);
$Cliente->setNome($nome);
$Cliente->setDataNascimento($dataNascimento);
$Cliente->setCpf($cpf);
$Cliente->setSexo($sexo);
$Cliente->setEmail($email);
$Cliente->setTelefone($telefone);
$Cliente->setObservacao($observacao);

$Categoria->setId($idCategoria);

$Cliente->setCategoria($Categoria);

$RC = new RepositorioCliente();

$retorno = $RC->alterarCliente($Cliente);

if ($retorno) {

    header("location:../index.php?cod=8&c=1&idCliente=" . $idCliente);
} else {

    header("location:../index.php?cod=8&c=2&idCliente=" . $idCliente);
}

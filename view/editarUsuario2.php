<?php

use src\Usuario;
use src\RepositorioUsuario;

require_once '../src/Usuario.php';
require_once '../src/RepositorioUsuario.php';

// Recebendo dados do form de cadastro de usuário
$idUsuario        = $_POST['idUsuario'];
$nome             = $_POST['nome'];
$perfil           = $_POST['perfil'];
$email            = $_POST['email'];
$login            = $_POST['login'];
$senha            = $_POST['senha'];

// Instanciando classe Usuário
$Usuario = new Usuario();

// Definindo o fuso horário padrão
date_default_timezone_set('America/Recife');

// Efetuando set nos atributos da classe Usuario
$Usuario->setId($idUsuario);
$Usuario->setNome($nome);
$Usuario->setPerfil($perfil);
$Usuario->setEmail($email);
$Usuario->setLogin($login);
$Usuario->setSenha($senha);

$RU = new RepositorioUsuario();

$retorno = $RU->alterarUsuario($Usuario);

if ($retorno) {

    header("location:../index.php?cod=7&c=1&idUsuario=" . $idUsuario);
} else {

    header("location:../index.php?cod=7&c=2&idUsuario=" . $idUsuario);
}

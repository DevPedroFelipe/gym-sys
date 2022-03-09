<?php

use src\Usuario;
use src\RepositorioUsuario;

require_once 'src/Usuario.php';
require_once 'src/RepositorioUsuario.php';

// Recebendo dados do form de cadastro de usuário
$nomeCompleto     = $_POST['nomeCompleto'];
$perfil           = $_POST['perfil'];
$email            = $_POST['email'];
$login            = $_POST['login'];
$senha            = $_POST['senha'];
$status           = $_POST['status'];

// Instanciando classe Usuário
$Usuario = new Usuario();

// Definindo o fuso horário padrão
date_default_timezone_set('America/Recife');

// Efetuando set nos atributos da classe Usuario
$Usuario->setNomeCompleto($nomeCompleto);
$Usuario->setPerfil($perfil);
$Usuario->setEmail($email);
$Usuario->setLogin($login);
$Usuario->setSenha($senha);
$Usuario->setStatus($status);
$Usuario->setDataCadastro(date('Y-m-d H:i:s')); // Data e hora baseadas no fuso horário padrão definido

$RU = new RepositorioUsuario();

$retorno = $RU->cadastrarUsuario($Usuario);

if ($retorno) {

    header("location:index.php?cod=1&c=1");
} else {

    header("location:index.php?cod=1&c=2");
}

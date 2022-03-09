<?php
/*
if (session_status() !== PHP_SESSION_ACTIVE) {
    
    require 'sessao.php';
    
} 

*/

?>

<html lang="pt-br">

<head>
    <title>GYM SYS - Cadastro de Usuário</title>
    <meta charset="UTF-8">
</head>

<body>
    <div class="container-fluid padding w-75 p-3 bootstrap snippet">
        <form class="bg-dark text-white p-3" method="post" action="cadastrarUsuario2.php">
            <?php

            if (isset($_GET['c'])) {

                if ($_GET['c'] == 1) {

                    echo '<div class="alert alert-success alert-white rounded">
					        <button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button>
					        <div class="icon">
					            <i class="fa fa-check fa-lg text-white"></i>
					        </div>
					        <strong>Sucesso!</strong> O usuário foi cadastrado!
					    </div>';
                }

                if ($_GET['c'] == 2) {

                    echo '<div class="alert alert-danger alert-white rounded">
					        <button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button>
					        <div class="icon">
					            <i class="fa fa-times-circle fa-lg text-white"></i>
					        </div>
					        <strong>Erro!</strong> O usuário não foi cadastrado!
					    </div>';
                }
            }

            ?>
            <div class="form-group text-center">
                <label class="display-6 text-center">CADASTRAR USUÁRIO&nbsp;<i class="fas fa-user"></i></label>
            </div>
            <div class="form-group">
                <label for="nomeCompleto">Nome Completo</label>
                <input type="text" name="nomeCompleto" class="form-control" id="nomeCompleto" required>
            </div>
            <div class="form-group">
                <label for="perfil">Perfil</label>
                <input type="text" name="perfil" class="form-control" id="perfil" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email" required>
            </div>
            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" name="login" class="form-control" id="login" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" name="senha" class="form-control" id="senha" required>
            </div>
            <label for="status">Status</label>
            </br>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="true" name="status" checked>Ativo
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="false" name="status">Inativo
                </label>
            </div>
            </br></br>
            <div class="col text-center">
                <button type="submit" class="btn btn-success text-center align-center">Cadastrar</button>&nbsp;
                <a href="index.php" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
</body>

</html>
<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    
    require '../session.php';
    
}

use src\RepositorioUsuario;

require_once 'src/RepositorioUsuario.php';

$idUsuario = $_GET['idUsuario'];

$RU = new RepositorioUsuario();

$Usuario = $RU->consultarUsuario($idUsuario);

?>

<div class="container-fluid padding w-75 p-3 bootstrap snippet">
    <form class="bg-light p-3" method="post" action="view/editarUsuario2.php">
        <?php

        if (isset($_GET['c'])) {

            if ($_GET['c'] == 1) {

                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Sucesso!</strong> O usuário foi alterado!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>';
            }

            if ($_GET['c'] == 2) {

                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Erro!</strong> O usuário não foi alterado!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>';
            }
        }

        ?>
        <nav class="float-end" aria-label="breadcrumb mt-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="index.php?cod=4">Relatório de Usuários</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar Usuário</li>
            </ol>
        </nav>
        <div class="form-group text-center">
            <label><i class="fas fa-user"></i>&nbsp;EDITAR USUÁRIO</label>
        </div>
        <div class="form-group">
            <label for="id">ID</label>
            <input type="number" name="id" class="form-control" id="id" value="<?= $Usuario->getId(); ?>" disabled>
            <input type="hidden" name="idUsuario" value="<?php echo $Usuario->getId(); ?>">
        </div>
        <div class="form-group">
            <label for="nome">Nome Completo</label>
            <input type="text" name="nome" class="form-control" id="nome" value="<?= $Usuario->getNome(); ?>" required>
        </div>
        <div class="form-group">
            <label for="perfil">Perfil</label>
            <select class="form-select" aria-label="Escolha o tipo de Perfil" name="perfil" id="perfil">
                <option value="Administrador" <?php if($Usuario->getPerfil() == "Administrador") {echo 'selected';} ?>>Administrador</option>
                <option value="Operador" <?php if($Usuario->getPerfil() == "Operador") {echo 'selected';} ?>>Operador</option>
                <option value="Visualizador" <?php if($Usuario->getPerfil() == "Visualizador") {echo 'selected';} ?>>Visualizador</option>
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" id="email" value="<?= $Usuario->getEmail(); ?>" required>
        </div>
        <div class="form-group">
            <label for="login">Login</label>
            <input type="text" name="login" class="form-control" id="login" value="<?= $Usuario->getLogin(); ?>" required>
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" name="senha" class="form-control" id="senha" value="<?= $Usuario->getSenha(); ?>" required>
        </div>
        </br></br>
        <div class="col text-center">
            <button type="submit" class="btn btn-success text-center align-center">Alterar</button>&nbsp;
            <a href="index.php?cod=4" class="btn btn-danger">Voltar</a>
        </div>
    </form>
</div>
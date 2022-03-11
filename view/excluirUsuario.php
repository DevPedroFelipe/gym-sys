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
    <form class="bg-light p-3" method="post" action="view/excluirUsuario2.php">
        <?php

        if (isset($_GET['c'])) {

            if ($_GET['c'] == 2) {

                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Erro!</strong> O usuário não foi excluído!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>';
            }
        }

        ?>
        <nav class="float-end" aria-label="breadcrumb mt-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="index.php?cod=4">Relatório de Usuários</a></li>
                <li class="breadcrumb-item active" aria-current="page">Excluir Usuário</li>
            </ol>
        </nav>
        <div class="form-group text-center">
            <label><i class="fas fa-user"></i>&nbsp;EXCLUIR USUÁRIO</label>
        </div>
        <div class="form-group">
            <label for="id">ID</label>
            <input type="number" name="id" class="form-control" id="id" value="<?= $Usuario->getId(); ?>" disabled>
            <input type="hidden" name="idUsuario" value="<?php echo $Usuario->getId(); ?>">
        </div>
        <div class="form-group">
            <label for="nome">Nome Completo</label>
            <input type="text" name="nome" class="form-control" id="nome" value="<?= $Usuario->getNome(); ?>" disabled>
        </div>
        <div class="form-group">
            <label for="perfil">Perfil</label>
            <select class="form-select" aria-label="Escolha o tipo de Perfil" name="perfil" id="perfil" disabled>
                <option value="Administrar" <?php if ($Usuario->getPerfil() == "Administrar") { echo 'selected'; } ?>>Administrar</option>
                <option value="Editar" <?php if ($Usuario->getPerfil() == "Editar") { echo 'selected'; } ?>>Editar</option>
                <option value="Visualizar" <?php if ($Usuario->getPerfil() == "Visualizar") { echo 'selected'; } ?>>Visualizar</option>
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" id="email" value="<?= $Usuario->getEmail(); ?>" disabled>
        </div>
        <div class="form-group">
            <label for="login">Login</label>
            <input type="text" name="login" class="form-control" id="login" value="<?= $Usuario->getLogin(); ?>" disabled>
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" name="senha" class="form-control" id="senha" value="<?= $Usuario->getSenha(); ?>" disabled>
        </div>
        </br></br>
        <div class="col text-center">
            <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Excluir</a>
            <a href="index.php?cod=4" class="btn btn-secondary">Voltar</a>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmação de Exclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Tem certeza que quer excluir o usuário(a) <strong><?= $Usuario->getNome(); ?></strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a href="view/excluirUsuario2.php?idUsuario=<?= $Usuario->getId(); ?>" class="btn btn-danger">Confirmar</a>
                </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php
/*
if (session_status() !== PHP_SESSION_ACTIVE) {
    
    require 'sessao.php';
    
}

*/

use src\RepositorioUsuario;

require_once 'src/RepositorioUsuario.php';

$idUsuario = $_GET['idUsuario'];

$RU = new RepositorioUsuario();

$Usuario = $RU->consultarUsuario($idUsuario);

?>

<div class="container-fluid padding w-75 p-3 bootstrap snippet">
    <form class="bg-dark text-white p-3" method="post" action="view/excluirUsuario2.php">
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
            <a href="#" class="btn btn-danger" id="btn-excluir">Excluir</a>
            <a href="index.php?cod=4" class="btn btn-secondary">Voltar</a>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#btn-excluir').click(function(ev) {

                    if (!$('#confirm-delete').length) {
                        $('body').append('<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header bg-danger text-white">EXCLUIR USUÁRIO<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza de que deseja excluir o usuário?</div><div class="modal-footer"><a href="excluirUsuario_2.php?idUsuario=<?php echo $idUsuario; ?>" class="btn btn-danger text-white" id="dataComfirmOK">Sim</a><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button></div></div></div></div>');
                    }

                    $('#confirm-delete').modal({
                        show: true
                    });
                    return false;
                });
            });
        </script>
    </form>
</div>
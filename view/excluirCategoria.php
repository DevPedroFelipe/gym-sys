<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    
    require '../session.php';
    
}

use src\RepositorioCategoria;

require_once 'src/RepositorioCategoria.php';

$idCategoria = $_GET['idCategoria'];

$RC = new RepositorioCategoria();

$Categoria = $RC->consultarCategoria($idCategoria);

?>

<div class="container-fluid padding w-75 p-3 bootstrap snippet">
    <form class="bg-light p-3" method="post" action="view/editarCategoria2.php">
        <?php

        if (isset($_GET['c'])) {

            if ($_GET['c'] == 2) {

                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Erro!</strong> A Categoria não foi excluída!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>';
            }
        }

        ?>
        <nav class="float-end" aria-label="breadcrumb mt-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="index.php?cod=6">Relatório de Categorias</a></li>
                <li class="breadcrumb-item active" aria-current="page">Excluir Categoria</li>
            </ol>
        </nav>
        <div class="form-group text-center">
            <label><i class="fas fa-user"></i></label>&nbsp;EXCLUIR CATEGORIA
        </div>
        <div class="form-group">
            <label for="id">ID</label>
            <input type="number" name="id" class="form-control" id="id" value="<?= $Categoria->getId(); ?>" disabled>
        </div>
        <div class="form-group">
            <label for="nome">Nome da Categoria</label>
            <input type="text" name="nome" class="form-control" id="nome" value="<?= $Categoria->getNome(); ?>" disabled>
        </div>
        <div class="form-group">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3" disabled><?= $Categoria->getDescricao(); ?></textarea>
        </div>
        </br></br>
        <div class="col text-center">
            <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Excluir</a>
            <a href="index.php?cod=6" class="btn btn-secondary">Voltar</a>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmação de Exclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Tem certeza que quer excluir a categoria <strong><?= $Categoria->getNome(); ?></strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a href="view/excluirCategoria2.php?idCategoria=<?= $Categoria->getId(); ?>" class="btn btn-danger">Confirmar</a>
                </div>
                </div>
            </div>
        </div>
    </form>
</div>
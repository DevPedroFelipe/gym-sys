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

            if ($_GET['c'] == 1) {

                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Sucesso!</strong> A Categoria foi alterada!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>';
            }

            if ($_GET['c'] == 2) {

                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Erro!</strong> A Categoria não foi alterada!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>';
            }
        }

        ?>
        <nav class="float-end" aria-label="breadcrumb mt-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="index.php?cod=6">Relatório de Categorias</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar Categoria</li>
            </ol>
        </nav>
        <div class="form-group text-center">
            <label><i class="fas fa-user"></i></label>&nbsp;EDITAR CATEGORIA
        </div>
        <div class="form-group">
            <label for="id">ID</label>
            <input type="number" name="id" class="form-control" id="id" value="<?= $Categoria->getId(); ?>" disabled>
            <input type="hidden" name="idCategoria" value="<?php echo $Categoria->getId(); ?>">
        </div>
        <div class="form-group">
            <label for="nome">Nome da Categoria</label>
            <input type="text" name="nome" class="form-control" id="nome" value="<?= $Categoria->getNome(); ?>" required>
        </div>
        <div class="form-group">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3"><?= $Categoria->getDescricao(); ?></textarea>
        </div>
        </br></br>
        <div class="col text-center">
            <button type="submit" class="btn btn-success text-center align-center">Alterar</button>&nbsp;
            <a href="index.php?cod=6" class="btn btn-danger">Voltar</a>
        </div>
    </form>
</div>
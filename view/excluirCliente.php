<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    
    require 'session.php';
    
} 

use src\Categoria;
use src\RepositorioCategoria;

require_once 'src/Categoria.php';
require_once 'src/RepositorioCategoria.php';

$RC = new RepositorioCategoria();

$Categorias = $RC->listarCategorias();

use src\RepositorioCliente;

require_once 'src/RepositorioCliente.php';

$idCliente = $_GET['idCliente'];

$RC = new RepositorioCliente();

$Cliente = $RC->consultarCliente($idCliente);

?>

<div class="container-fluid padding w-75 p-3 bootstrap snippet">
    <form class="bg-light p-3" method="post" action="view/editarCliente2.php">
        <?php

        if (isset($_GET['c'])) {

            if ($_GET['c'] == 1) {

                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Sucesso!</strong> O Cliente foi alterado!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>';
            }

            if ($_GET['c'] == 2) {

                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Sucesso!</strong> O Cliente não foi alterado!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>';
            }
        }

        ?>
        <nav class="float-end" aria-label="breadcrumb mt-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="index.php?cod=5">Relatório de Clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Excluir Cliente</li>
            </ol>
        </nav>
        <div class="form-group text-center">
            <label><i class="fas fa-user"></i></label>&nbsp;EDITAR CLIENTE
        </div>
        <div class="form-group">
            <label for="id">ID</label>
            <input type="number" name="id" class="form-control" id="id" value="<?= $Cliente->getId(); ?>" disabled>
            <input type="hidden" name="idCliente" value="<?php echo $Cliente->getId(); ?>">
        </div>
        <div class="form-group">
            <label for="nome">Nome Completo</label>
            <input type="text" name="nome" class="form-control" id="nome" value="<?= $Cliente->getNome(); ?>" disabled>
        </div>
        <div class="form-group">
            <label for="dataNascimento">Data de Nascimento</label>
            <input type="date" name="dataNascimento" class="form-control" id="dataNascimento" value="<?= $Cliente->getDataNascimento(); ?>" disabled>
        </div>
        <div class="form-group">
            <label for="sexo">Sexo</label><br>
        	F <input type="radio" name="sexo" id="sexo" value="f" <?php if($Cliente->getSexo() == "f") { echo "checked disabled";} ?> disabled>
        	M <input type="radio" name="sexo" id="sexo" value="m" <?php if($Cliente->getSexo() == "m") { echo "checked disabled";} ?> disabled>
        </div>
        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" name="cpf" class="form-control" id="cpf" maxlength="14" value="<?= $Cliente->getCpf(); ?>" disabled>
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" class="form-control" id="email" value="<?= $Cliente->getEmail(); ?>" disabled>
        </div>
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" class="form-control" id="telefone" maxlength="13" value="<?= $Cliente->getTelefone(); ?>" disabled>
        </div>
        <div class="form-group">
            <label for="observacao" class="form-label">Observação</label>
            <textarea class="form-control" id="observacao" name="observacao" rows="3" disabled><?= $Cliente->getObservacao(); ?></textarea>
        </div>
        <div class="form-group">
            <label for="categoria">Categoria</label>
            <select class="form-select" aria-label="Escolha o tipo de Perfil" id="categoria" name="categoria" disabled>
                <?php

                $Categoria = new Categoria();
                                            
                $i = 0;
                $qtdCategoria = count($Categorias);
                        
                while ($i < $qtdCategoria) {
                    $Categoria = $Categorias[$i];
                ?>

                <option value="<?php echo $Categoria->getId(); ?>" <?php if ($Categoria->getId() == $Cliente->getCategoria()->getId()) {echo "selected";} ?>><?php echo $Categoria->getNome(); ?></option>

                <?php
                $i++;		
                }

                ?>
            </select>
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
                    Tem certeza que quer excluir o cliente <strong><?= $Cliente->getNome(); ?></strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a href="view/excluirCliente2.php?idCliente=<?= $Cliente->getId(); ?>" class="btn btn-danger">Confirmar</a>
                </div>
                </div>
            </div>
        </div>
    </form>
</div>

</html>
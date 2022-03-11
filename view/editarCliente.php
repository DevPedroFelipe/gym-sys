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
                <li class="breadcrumb-item active" aria-current="page">Editar Cliente</li>
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
            <input type="text" name="nome" class="form-control" id="nome" value="<?= $Cliente->getNome(); ?>" required>
        </div>
        <div class="form-group">
            <label for="dataNascimento">Data de Nascimento</label>
            <input type="date" name="dataNascimento" class="form-control" id="dataNascimento" value="<?= $Cliente->getDataNascimento(); ?>" required>
        </div>
        <div class="form-group">
            <label for="sexo">Sexo</label><br>
        	F <input type="radio" name="sexo" id="sexo" value="f" <?php if($Cliente->getSexo() == "f") { echo "checked";} ?>>
        	M <input type="radio" name="sexo" id="sexo" value="m" <?php if($Cliente->getSexo() == "m") { echo "checked";} ?>>
        </div>
        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" name="cpf" class="form-control" id="cpf" maxlength="14" value="<?= $Cliente->getCpf(); ?>" required>
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" class="form-control" id="email" value="<?= $Cliente->getEmail(); ?>" required>
        </div>
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" class="form-control" id="telefone" maxlength="13" value="<?= $Cliente->getTelefone(); ?>" required>
        </div>
        <div class="form-group">
            <label for="observacao" class="form-label">Observação</label>
            <textarea class="form-control" id="observacao" name="observacao" rows="3"><?= $Cliente->getObservacao(); ?></textarea>
        </div>
        <div class="form-group">
            <label for="categoria">Categoria</label>
            <select class="form-select" aria-label="Escolha o tipo de Perfil" id="categoria" name="categoria">
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
            <button type="submit" class="btn btn-success text-center align-center">Alterar</button>&nbsp;
            <a href="index.php?cod=5" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
</div>

</html>
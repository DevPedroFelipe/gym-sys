<?php

if (session_status() !== PHP_SESSION_ACTIVE) {

	require '../session.php';
}

use src\RepositorioCliente;

require_once 'src/Cliente.php';
require_once 'src/RepositorioCliente.php';

$RC = new RepositorioCliente();

$Clientes = $RC->listarClientes();


?>

<div class="container">
	<div class="container-fluid padding w-100 p-3">
		<?php

		if (isset($_GET['c'])) {

			if ($_GET['c'] == 1) {

				echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Sucesso!</strong> O Cliente foi excluído!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>';
			}
		}

		?>
		<nav class="float-end" aria-label="breadcrumb mt-5">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Relatório de Clientes</li>
			</ol>
		</nav>
		<table class="table table-borderless table-light table-striped table-hover w-100">
			<thead>
				<tr>
					<th colspan="4"><i class="fas fa-user">&nbsp;</i>RELATÓRIO DE CLIENTES</th>
				</tr>
			</thead>
			<thead>
				<tr>
					<th>NOME</th>
					<th>CPF</th>
					<th>CATEGORIA</th>
					<th>MENU</th>
				</tr>
			</thead>
			<?php

			$i = 0;
			$quantidade = count($Clientes);

			while ($i < $quantidade) {

				$Cliente = $Clientes[$i];

			?>
				<tr>
					<td><?php echo $Cliente->getNome(); ?></td>
					<td><?php echo $Cliente->getCpf(); ?></td>
					<td><?php echo $Cliente->getCategoria()->getNome(); ?></td>
					<td>
						<a data-toggle="tooltip" data-placement="bottom" title="Alterar" class="btn btn-success btn-sm text-white" href="index.php?cod=8&idCliente=<?php echo $Cliente->getId(); ?>"><i class="fas fa-edit"></i></a>
						<a data-toggle="tooltip" data-placement="bottom" title="Excluir" class="btn btn-danger btn-sm text-white" href="index.php?cod=11&idCliente=<?php echo $Cliente->getId(); ?>"><i class="fas fa-trash-alt"></i></a>
					</td>
				</tr>
				<script>
					$(document).ready(function() {
						$('[data-toggle="tooltip"]').tooltip();
					});
				</script>
			<?php
				$i++;
			}
			?>
		</table>
	</div>
</div>
</body>

</html>
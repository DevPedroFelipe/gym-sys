<?php

if (session_status() !== PHP_SESSION_ACTIVE) {

	require '../session.php';
}

use src\RepositorioUsuario;

require_once 'src/Usuario.php';
require_once 'src/RepositorioUsuario.php';

$RU = new RepositorioUsuario();

$Usuarios = $RU->listarUsuarios();


?>

<div class="container">
	<div class="container-fluid padding w-100 p-3">
		<?php

		if (isset($_GET['c'])) {

			if ($_GET['c'] == 1) {

				echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Sucesso!</strong> O usuário foi excluído!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>';
			}
		}

		?>
		<nav aria-label="breadcrumb mt-5">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Relatório de Usuários</li>
			</ol>
		</nav>
		<table class="table table-borderless table-light table-striped table-hover w-100">
			<thead>
				<tr>
					<th colspan="4"><i class="fas fa-user">&nbsp;</i>RELATÓRIO DE USUÁRIOS</th>
				</tr>
			</thead>
			<thead>
				<tr>
					<th>NOME</th>
					<th>LOGIN</th>
					<th>PERFIL</th>
					<th>MENU</th>
				</tr>
			</thead>
			<?php

			$i = 0;
			$quantidade = count($Usuarios);

			while ($i < $quantidade) {

				$Usuario = $Usuarios[$i];

			?>
				<tr>
					<td><?php echo $Usuario->getNome(); ?></td>
					<td><?php echo $Usuario->getLogin(); ?></td>
					<td><?php echo $Usuario->getPerfil(); ?></td>
					<td>
						<a data-toggle="tooltip" data-placement="bottom" title="Alterar" class="btn btn-success btn-sm text-white" href="index.php?cod=7&idUsuario=<?php echo $Usuario->getId(); ?>"><i class="fas fa-edit"></i></a>
						<a data-toggle="tooltip" data-placement="bottom" title="Excluir" class="btn btn-danger btn-sm text-white" href="index.php?cod=10&idUsuario=<?php echo $Usuario->getId(); ?>"><i class="fas fa-trash-alt"></i></a>
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
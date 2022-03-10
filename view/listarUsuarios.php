<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    
    require 'sessao.php';
    
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

                if(isset($_GET['c'])) {

                	if($_GET['c'] == 1) {

                		echo '<div class="alert alert-success alert-white rounded">
					        <button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button>
					        <div class="icon">
					            <i class="fa fa-check fa-lg text-white"></i>
					        </div>
					        <strong>Sucesso!</strong> O usuário foi excluído!
					    </div>';

                	}

                }

                ?>
				<table class="table table-light table-striped table-hover w-100">
					<thead>
						<tr>
							<th><i class="fas fa-user">&nbsp;</i>RELATÓRIO DE USUÁRIOS</th>
						</tr>
					</thead>
					<thead>
						<tr>
							<th><kbd>NOME</kbd></th>
							<th><kbd>LOGIN</kbd></th>
							<th><kbd>PERFIL</kbd></th>
							<th><kbd>MENU</kbd></th>
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
							<a data-toggle="tooltip" data-placement="bottom" title="Alterar" class="btn btn-success btn-sm text-white" href= "index.php?cod=7&idUsuario=<?php echo $Usuario->getId(); ?>"><i class="fas fa-edit"></i></a>
							<a data-toggle="tooltip" data-placement="bottom" title="Excluir" class="btn btn-danger btn-sm text-white" href= "index.php?cod=10&idUsuario=<?php echo $Usuario->getId(); ?>"><i class="fas fa-trash-alt"></i></a>
						</td>
					</tr>
					<script>
						$(document).ready(function(){
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
<?php
/*
if (session_status() !== PHP_SESSION_ACTIVE) {
    
    require 'sessao.php';
    
}
*/

use src\RepositorioUsuario;

require_once 'src/Usuario.php';
require_once 'src/RepositorioUsuario.php';

$RU = new RepositorioUsuario();

$Usuarios = $RU->listarUsuarios();


?>

<html lang="pt-br">
	<head>
		<title>GYM SYS - Listar Usuários</title>
		<meta charset="UTF-8">
	</head>
	<body>
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
				<table class="table table-dark table-striped table-hover w-100">
					<thead>
						<tr>
							<th colspan="6" class="display-4 text-center" colspan="5">LISTA DE USUÁRIOS&nbsp;<i class="fas fa-user"></i></th>
						</tr>
					</thead>
					<thead>
						<tr>
							<th colspan="6">
								<a class="btn btn-secondary float-right" href="index.php?cod=7"><i class="fas fa-plus"></i>&nbsp;Cadastrar</a>
							</th>
						</tr>
					</thead>
					<thead>
						<tr>
							<th><h4><kbd>ID</kbd></h4></th>
							<th><h4><kbd>LOGIN</kbd></h4></th>
							<th><h4><kbd>STATUS</kbd></h4></th>
							<th><h4><kbd>OPÇÕES</kbd></h4></th>
						</tr>
					</thead>
					<?php

					$i = 0;
				    $quantidade = count($Usuarios);
				
	    			while ($i < $quantidade) {

	    				$Usuario = $Usuarios[$i];

	    				if ($Usuario->getStatus() == 1) {
    
    			        $cor = "#00FF00";
    			        
	    			    } else {

	    			        $cor = "#FF0000";
	    			    }

					?>
					<tr>
						<td><?php echo $Usuario->getId(); ?></td>
						<td><?php echo $Usuario->getLogin(); ?></td>
						<td style = "color:<?php echo $cor?>;"><?php if ($Usuario->getStatus() == 1) { echo "Ativo"; } else { echo "Inativo"; } ?></td>
						<td>
						<a data-toggle="tooltip" data-placement="bottom" title="Consultar" class="btn btn-info btn-sm" href = "index.php?cod=8&idUsuario=<?php echo $Usuario->getId(); ?>"><i class="far fa-eye"></i></a>
						<?php

						if ($Usuario->getStatus() == 1) {
							echo '<a data-toggle="tooltip" data-placement="bottom" title="Alterar Status" class="btn btn-warning btn-sm text-white" href="alterarStatusUsuario.php?idUsuario='.$Usuario->getId().'&status=false"><i class="fas fa-unlock"></i><a/>';
						} else {
							echo '<a data-toggle="tooltip" data-placement="bottom" title="Alterar Status" class="btn btn-warning btn-sm text-white" href="alterarStatusUsuario.php?idUsuario='.$Usuario->getId().'&status=true"><i class="fas fa-lock"></i><a/>';
						} 
					
						?>	
						<a data-toggle="tooltip" data-placement="bottom" title="Alterar" class="btn btn-success btn-sm text-white" href= "index.php?cod=9&idUsuario=<?php echo $Usuario->getId(); ?>"><i class="fas fa-edit"></i></a>
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
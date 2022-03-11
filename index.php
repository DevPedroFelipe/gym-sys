<?php

session_start();

require_once 'includes/header.php';

?>

<div class="container">
  <nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container-fluid w-100">
      <a class="navbar-brand" href="index.php"><img src="img/brandIcon.png"></a>
      <p id="parGym">GYM Sys</p>
      <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon bg-light"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <?php

            if ((isset($_SESSION['login'])) and (isset($_SESSION['senha']))) {

              if($_SESSION['perfilUsuario'] != "Visualizador") {
                echo '<li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-circle-plus fa-lg"></i>&nbsp;Cadastrar</a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="index.php?cod=1">Usuário</a></li>
                        <li><a class="dropdown-item" href="index.php?cod=2">Cliente</a></li>
                        <li><a class="dropdown-item" href="index.php?cod=3">Categoria</a></li>
                      </ul>
                    </li>';
              }
              
              echo'<li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-bars-staggered fa-lg"></i>&nbsp;Relatório</a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="index.php?cod=4">Usuário</a></li>
                        <li><a class="dropdown-item" href="index.php?cod=5">Cliente</a></li>
                        <li><a class="dropdown-item" href="index.php?cod=6">Categoria</a></li>
                      </ul>
                  </li>';
            }
          ?>
          <li class="nav-item dropdown navLogin">
          <?php

          if ((!isset($_SESSION['login'])) and (!isset($_SESSION['senha']))) {
            echo '<a class="nav-link" href="view/loginUsuario.php"><i class="fas fa-sign-in-alt fa-lg"></i>&nbsp;Login</a>';
          } else {
            echo '<a class="nav-link" href="view/logoffUsuario.php"><i class="fas fa-sign-out-alt fa-lg"></i>&nbsp;Logoff</a>';
          }

          ?>
        </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="alert bg-info alert-dismissible fade show mt-5" role="alert">
    <strong>Bem Vindo(a)!</strong> Esse sistema tem como função cadastrar os clientes matriculados na academia Força do Hábito.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <div class="container-fluid padding h-75 overflow-auto">
    <?php

    if(!isset($_GET['cod'])) {
      include 'view/dashboard.php';
    }

    if (isset($_SESSION['login']) and isset($_SESSION['senha'])) {

      if (isset($_GET['cod'])) {

        switch ($_GET['cod']) {
          case 1:
            include 'view/cadastrarUsuario.php';
            break;
          case 2:
            include 'view/cadastrarCliente.php';
            break;
          case 3:
            include 'view/cadastrarCategoria.php';
            break;
          case 4:
            include 'view/listarUsuarios.php';
            break;
          case 5:
            include 'view/listarClientes.php';
            break;
          case 6:
            include 'view/listarCategorias.php';
            break;
          case 7:
            include 'view/editarUsuario.php';
            break;
          case 8:
            include 'view/editarCliente.php';
            break;
          case 9:
            include 'view/editarCategoria.php';
            break;
          case 10:
            include 'view/excluirUsuario.php';
            break;
          case 11:
            include 'view/excluirCliente.php';
            break;
          case 12:
            include 'view/excluirCategoria.php';
            break;
        }
      }
    }
    ?>
  </div>
</div>

<?php
require_once 'includes/footer.php';
?>
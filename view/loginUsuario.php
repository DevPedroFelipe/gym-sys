<?php

require_once '../includes/header.php';

?>

<style type="text/css">
    @import url('https://fonts.googleapis.com/css?family=Roboto');

    body {
        font-family: 'Roboto', sans-serif;
        background: url(../img/loginBackground.jpg) no-repeat center center fixed;
        background-size: contain;
    }

    .main-section {
        margin: 0 auto;
        margin-top: 130px;
        padding: 0;
    }

    .modal-content {
        background-color: #3b4652;
        opacity: .95;
        padding: 0 18px;
        box-shadow: 0px 0px 3px #848484;
    }

    .user-img {
        margin-top: -50px;
        margin-bottom: 35px;
    }

    .user-img img {
        height: 100px;
        width: 100px;
        border-radius: 5px;
        box-shadow: 0px 0px 2px #848484;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group input {
        height: 42px;
        border-radius: 5px;
        border: 0;
        font-size: 18px;
        padding-left: 54px;
    }

    .form-group::before {
        font-family: "Font Awesome 6 Free";
        font: var(--fa-font-solid);
        content: "\f007";
        position: absolute;
        font-size: 22px;
        color: #555e60;
        left: 28px;
        padding-top: 10px;
    }

    .form-group:last-of-type::before {
        content: "\f023";
    }

    button {
        width: 40%;
        margin: 5px 0 25px;
    }

    .btn {
        background-color: #27c2a5;
        color: #fff;
        font-size: 19px;
        padding: 7px 14px;
        border-radius: 5px;
        border-bottom: 4px solid #219882;
    }

    .btn:hover,
    btn:focus {
        background-color: #25a890;
        border-bottom: 4px solid #25a890 !important;
    }

    .svg-inline--fa {
        font-size: 20px;
        margin-right: 7px;
    }

    .forgot {
        padding: 5px 0 25px;
    }

    .forgot a {
        color: #c2fbfe;
    }
</style>

<div class="modal-dialog text-center">
    <div class="col-sm-8 main-section">
        <div class="modal-content">
            <div class="col-12 user-img">
                <img src="../img/user.svg">
            </div>
            <form name="telalogin" class="col-12" method="post" action="autenticacaoUsuario.php">
                <div class="form-group">
                    <input name="login" type="text" value="<?php if (empty($_GET['login']) === false) { echo $_GET['login']; } ?>" class="form-control" placeholder="Digite o Usuário">
                </div>
                <div class="form-group">
                    <input name="senha" type="password" class="form-control" placeholder="Digite a Senha">
                </div>
                <button type="submit" class="btn" id="botao-login"><i class="fas fa-sign-in-alt"></i>Login</button>
            </form>
            <div class="col-12 forgot">
                <a href="#">Esqueceu a Senha?</a>
            </div>
            <?php

            if (isset($_GET['erro'])) {

                echo '<div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Aviso!</strong> Usuário ou senha inexistente ou incorreto.
                      </div>';
            }

            ?>
        </div>
    </div>
</div>
<?php

require_once '../includes/footer.php';

?>
<?php

namespace src;

require_once 'Usuario.php';
require_once 'ConexaoMySQL.php';

class RepositorioUsuario {

    // Atributos
    private $ConexaoMySQL;

    // Construtor
    public function __construct() {
        $this->ConexaoMySQL = new ConexaoMySQL();
    }

    // Método responsável pelo cadastro do usuario
    public function cadastrarUsuario($Usuario) {
        $retorno = false;

        $cadastrar = "INSERT INTO USUARIO(NOME, LOGIN, SENHA, PERFIL, EMAIL, DATACADASTRO) VALUES('" . $Usuario->getNome() . "', '" . $Usuario->getLogin() . "', SHA1('" . $Usuario->getSenha() . "'), '" . $Usuario->getPerfil() . "', '" . $Usuario->getEmail() . "', '" . $Usuario->getDataCadastro() . "');";

        $conexao = $this->ConexaoMySQL->abrirBanco();

        if ($conexao->query($cadastrar)) {

            $retorno = true;
        } else {
            echo mysqli_error($conexao);
        }

        return $retorno;

        $this->ConexaoMySQL->fecharBanco();
    }

    // Método responsável por consultar o usuário pelo id
    public function consultarUsuario($idUsuario) {
        $Usuario = new Usuario();
        $consultar = "SELECT * FROM USUARIO WHERE ID = " . $idUsuario . ";";
        
        $conexao = $this->ConexaoMySQL->abrirBanco();
        $resultado = $conexao->query($consultar);

        if ($resultado->num_rows > 0) {

            while ($linha = $resultado->fetch_assoc()) {

                $Usuario = new Usuario();

                $Usuario->setId($linha['ID']);
                $Usuario->setNome($linha['NOME']);
                $Usuario->setLogin($linha['LOGIN']);
                $Usuario->setSenha($linha['SENHA']);
                $Usuario->setPerfil($linha['PERFIL']);
                $Usuario->setEmail($linha['EMAIL']);
                $Usuario->setDataCadastro($linha['DATACADASTRO']);
            }
        } else {
            $Usuario = false;
        }

        $this->ConexaoMySQL->fecharBanco();
        
        return $Usuario;
    }

    // Método responsável por listar o(s) usuario(s)
    public function listarUsuarios() {
        
        $consultar = "SELECT USUARIO.ID, USUARIO.LOGIN, USUARIO.NOME, USUARIO.PERFIL FROM USUARIO;";

        $conexao = $this->ConexaoMySQL->abrirBanco();
        $resultado = $conexao->query($consultar);

        if ($resultado->num_rows > 0) {

            $i = 0;
            while ($linha = $resultado->fetch_assoc()) {
                $Usuario = new Usuario();

                $Usuario->setId($linha['ID']);
                $Usuario->setLogin($linha['LOGIN']);
                $Usuario->setNome($linha['NOME']);
                $Usuario->setPerfil($linha['PERFIL']);

                $Usuarios[$i] = $Usuario;

                $i++;
            }
        } else {
            $Usuarios = false;
        }

        $this->ConexaoMySQL->fecharBanco();

        return $Usuarios;
    }

    // Método responsável pela alteração do usuario
    public function alterarUsuario($Usuario) {
        $retorno = false;

        $alterar = "UPDATE USUARIO SET NOME = '" . $Usuario->getNome() . "', LOGIN = '" . $Usuario->getLogin() . "', SENHA = SHA1('" . $Usuario->getSenha() . "'), PERFIL = '" . $Usuario->getPerfil() . "', EMAIL = '" . $Usuario->getEmail() . "' WHERE ID = " . $Usuario->getId() . ";";
        
        $conexao = $this->ConexaoMySQL->abrirBanco();

        if ($conexao->query($alterar)) {

            $retorno = true;
        } else {
            echo mysqli_error($conexao);
        }

        $this->ConexaoMySQL->fecharBanco();

        return $retorno;
    }

    // Método responsável pela exclusão do usuario
    public function excluirUsuario($idUsuario) {
        $retorno = false;

        $deletar = "DELETE FROM USUARIO WHERE ID = " . $idUsuario . "";

        $conexao = $this->ConexaoMySQL->abrirBanco();

        if ($conexao->query($deletar)) {

            $retorno = true;
        } else {
            echo mysqli_error($conexao);
        }

        $this->ConexaoMySQL->fecharBanco();

        return $retorno;
    }

    public function autenticarUsuario($login, $senha) {
        $retorno = false;

        $autenticar = "SELECT USUARIO.ID AS IDUSUARIO, USUARIO.PERFIL AS PERFILUSUARIO FROM USUARIO WHERE BINARY LOGIN = '" . $login . "' AND BINARY SENHA = SHA1('" . $senha . "');";

        $conexao = $this->ConexaoMySQL->abrirBanco();
        $resultado = $conexao->query($autenticar);

        if ($resultado->num_rows > 0) {

            while ($linha = $resultado->fetch_assoc()) {
                $_SESSION['idUsuario'] = $linha['IDUSUARIO'];
                $_SESSION['perfilUsuario'] = $linha['PERFILUSUARIO'];
                
                $retorno = true;
            }
        }
        return $retorno;
    }
}

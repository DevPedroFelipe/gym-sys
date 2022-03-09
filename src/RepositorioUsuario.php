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
    
    // Métodos:
    
    // Método responsável pelo cadastro do usuario
    public function cadastrarUsuario($Usuario) {
        $retorno = false;
        
        $cadastrar = "INSERT INTO USUARIO(NOMECOMPLETO, LOGIN, SENHA, PERFIL, EMAIL, STATUS, DATACADASTRO) VALUES(".$Usuario->getNomeCompleto().", '".$Usuario->getLogin()."', SHA1('".$Usuario->getSenha()."'), ".$Usuario->getPerfil().", ".$Usuario->getEmail().", ".$Usuario->getStatus().", '".$Usuario->getDataCadastro()."');";
        
        $conexao = $this->ConexaoMySQL->abrirBanco();
        
        if($conexao->query($cadastrar)) {
            
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
        
        $consultar = "SELECT * FROM USUARIO WHERE USUARIO.ID = ".$idUsuario.";";

        $conexao = $this->ConexaoMySQL->abrirBanco();
        $resultado = $conexao->query($consultar);
        
        if($resultado->num_rows > 0) {

            while($linha = $resultado->fetch_assoc()) {

                $Usuario = new Usuario();

                $Usuario->setId($linha['ID']);
                $Usuario->setLogin($linha['LOGIN']);
                $Usuario->setSenha($linha['SENHA']);
                $Usuario->setPrimeiroAcesso($linha['PERFIL']);
                $Usuario->setUltimoAcesso($linha['EMAIL']);
                $Usuario->setStatus($linha['STATUS']);
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
        $Perguntas = null;
        
        $consultar = "SELECT USUARIO.ID, USUARIO.LOGIN, USUARIO.STATUS FROM USUARIO;";

        $conexao = $this->ConexaoMySQL->abrirBanco();
        $resultado = $conexao->query($consultar);
        
        if($resultado->num_rows > 0) {
            
            $i = 0;
            while($linha = $resultado->fetch_assoc()) {
                $Usuario = new Usuario();

                $Usuario->setId($linha['ID']);
                $Usuario->setLogin($linha['LOGIN']);
                $Usuario->setStatus($linha['STATUS']);

                $Usuarios[$i] = $Usuario;
                
                $i++;
            }
        } else {
            $Usuarios = false;
        }
        
        $this->ConexaoMySQL->fecharBanco();
        
        return $Usuarios;
    }

    // Método responsável pela alteração do status do usuário pelo id
    public function alterarStatusUsuario($id, $status) {
        $retorno = false;
        
        $alterar = "UPDATE USUARIO SET STATUS = ".$status." WHERE ID = ".$id.";";
        
        $conexao = $this->ConexaoMySQL->abrirBanco();
        
        if($conexao->query($alterar)) {
            
            $retorno = true;
        } else {
            echo mysqli_error($conexao);
        }
        
        $this->ConexaoMySQL->fecharBanco();
        
        return $retorno;
    }

    // Método responsável pela alteração do usuario
    public function alterarUsuario($Usuario) {
        $retorno = false;
        
        $alterar = "UPDATE USUARIO SET NOMECOMPLETO = ".$Usuario->getNomeCompleto().", LOGIN = '".$Usuario->getLogin()."', SENHA = SHA1('".$Usuario->getSenha()."'), PERFIL = ".$Usuario->getPerfil().", EMAIL = ".$Usuario->getEmail().", STATUS = ".$Usuario->getStatus()." WHERE ID = ".$Usuario->getId()."";

        $conexao = $this->ConexaoMySQL->abrirBanco();
        
        if($conexao->query($alterar)) {
            
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
        
        $alterar = "DELETE USUARIO WHERE ID = ".$idUsuario."";
        
        $conexao = $this->ConexaoMySQL->abrirBanco();
        
        if($conexao->query($alterar)) {
            
            $retorno = true;
        } else {
            echo mysqli_error($conexao);
        }
        
        $this->ConexaoMySQL->fecharBanco();
        
        return $retorno;
    }

    public function autenticarUsuario($login, $senha) {
        $retorno = false;
        
        $autenticar = "SELECT USUARIO.ID AS IDUSUARIO, USUARIO.STATUS FROM USUARIO WHERE BINARY LOGIN = '".$login."' AND BINARY SENHA = SHA1('".$senha."')";

        $conexao = $this->ConexaoMySQL->abrirBanco();
        $resultado = $conexao->query($autenticar);
        
        if ($resultado->num_rows > 0) {
            
            while ($linha = $resultado->fetch_assoc()) {
                
                if ($linha['STATUS']) {
                    
                    $_SESSION['idUsuario'] = $linha['IDUSUARIO'];
                    
                    $retorno = true;
                }
            }
        }
        return $retorno;
    }
}
?>
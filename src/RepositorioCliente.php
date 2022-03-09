<?php

namespace src;

require_once 'Cliente.php';
require_once 'ConexaoMySQL.php';

class RepositorioCliente {

    // Atributos
    private $ConexaoMySQL;

    // Construtor
    public function __construct() {
        $this->ConexaoMySQL = new ConexaoMySQL();
    }

    // Método responsável pelo cadastro do cliente
    public function cadastrarCliente($Cliente) {
        $retorno = false;

        $cadastrar = "INSERT INTO CLIENTE(IDCATEGORIA, NOMECOMPLETO, DATANASCIMENTO, CPF, SEXO, EMAIL, TELEFONE, STATUS, DATACADASTRO) VALUES(" . $Cliente->getCategoria()->getId() . ", '" . $Cliente->getNomeCompleto() . "', '" . $Cliente->getDataNascimento() . "', '" . $Cliente->getSexo() . "', '" . $Cliente->getEmail() . "', '".$Cliente->getTelefone()."', " . $Cliente->getStatus() . ", '" . $Cliente->getDataCadastro() . "');";

        $conexao = $this->ConexaoMySQL->abrirBanco();

        if ($conexao->query($cadastrar)) {

            $retorno = true;
        } else {
            echo mysqli_error($conexao);
        }

        return $retorno;

        $this->ConexaoMySQL->fecharBanco();
    }

    // Método responsável por consultar o cliente pelo id
    public function consultarCliente($idCliente) {

        $consultar = "SELECT * FROM CLIENTE WHERE CLIENTE.ID = " . $idCliente . ";";

        $conexao = $this->ConexaoMySQL->abrirBanco();
        $resultado = $conexao->query($consultar);

        if ($resultado->num_rows > 0) {

            while ($linha = $resultado->fetch_assoc()) {

                $Cliente = new Cliente();

                $Cliente->setId($linha['ID']);
                $Cliente->setNomeCompleto($linha['NOMECOMPLETO']);
                $Cliente->setDataNascimento($linha['DATANASCIMENTO']);
                $Cliente->setCPF($linha['CPF']);
                $Cliente->setEmail($linha['EMAIL']);
                $Cliente->setSexo($linha['SEXO']);
                $Cliente->setTelefone($linha['TELEFONE']);
                $Cliente->setStatus($linha['STATUS']);
                $Cliente->setDataCadastro($linha['DATACADASTRO']);
                
                $Categoria = new Categoria();

                $Categoria->setId($linha['IDCATEGORIA']);

                $Cliente->setCategoria($Categoria);
            }
        } else {
            $Cliente = false;
        }

        $this->ConexaoMySQL->fecharBanco();

        return $Cliente;
    }

    // Método responsável por listar o(s) clientes(s)
    public function listarClientes() {

        $consultar = "SELECT CLIENTE.ID, CLIENTE.NOMECOMPLETO, CLIENTE.STATUS FROM CLIENTE;";

        $conexao = $this->ConexaoMySQL->abrirBanco();
        $resultado = $conexao->query($consultar);

        if ($resultado->num_rows > 0) {

            $i = 0;
            while ($linha = $resultado->fetch_assoc()) {
                $Cliente = new Cliente();

                $Cliente->setId($linha['ID']);
                $Cliente->setNomeCompleto($linha['NOMECOMPLETO']);
                $Cliente->setStatus($linha['STATUS']);

                $Clientes[$i] = $Cliente;

                $i++;
            }
        } else {
            $Cliente = false;
        }

        $this->ConexaoMySQL->fecharBanco();

        return $Clientes;
    }

    // Método responsável pela alteração do status do cliente pelo id
    public function alterarStatusCliente($id, $status) {
        $retorno = false;

        $alterar = "UPDATE CLIENTE SET STATUS = " . $status . " WHERE ID = " . $id . ";";

        $conexao = $this->ConexaoMySQL->abrirBanco();

        if ($conexao->query($alterar)) {

            $retorno = true;
        } else {
            echo mysqli_error($conexao);
        }

        $this->ConexaoMySQL->fecharBanco();

        return $retorno;
    }

    // Método responsável pela alteração do usuario
    public function alterarCliente($Cliente) {
        $retorno = false;

        $alterar = "UPDATE CLIENTE SET IDCATEGORIA = ".$Cliente->getCategoria()->getId().", NOMECOMPLETO = " . $Cliente->getNomeCompleto() . ", DATANASCIMENTO = '" . $Cliente->getDataNascimento() . "', CPF = '" . $Cliente->getCpf() . "', SEXO = '" . $Cliente->getSexo() . "', EMAIL = '" . $Cliente->getEmail() . "', TELEFONE = '".$Cliente->getTelefone()."', STATUS = " . $Cliente->getStatus() . " WHERE ID = " . $Cliente->getId() . ";";
        
        $conexao = $this->ConexaoMySQL->abrirBanco();

        if ($conexao->query($alterar)) {

            $retorno = true;
        } else {
            echo mysqli_error($conexao);
        }

        $this->ConexaoMySQL->fecharBanco();

        return $retorno;
    }

    // Método responsável pela exclusão do cliente
    public function excluirUsuario($idCliente) {
        $retorno = false;

        $deletar = "DELETE CLIENTE WHERE ID = " . $idCliente . ";";

        $conexao = $this->ConexaoMySQL->abrirBanco();

        if ($conexao->query($deletar)) {

            $retorno = true;
        } else {
            echo mysqli_error($conexao);
        }

        $this->ConexaoMySQL->fecharBanco();

        return $retorno;
    }
}

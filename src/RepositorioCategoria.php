<?php

namespace src;

require_once 'Categoria.php';
require_once 'ConexaoMySQL.php';

class RepositorioCategoria {

    // Atributos
    private $ConexaoMySQL;

    // Construtor
    public function __construct() {
        $this->ConexaoMySQL = new ConexaoMySQL();
    }

    // Método responsável pelo cadastro da categoria
    public function cadastrarCategoria($Categoria) {
        $retorno = false;

        $cadastrar = "INSERT INTO CATEGORIA(NOME, DESCRICAO) VALUES('" . $Categoria->getNome() . "', '" . $Categoria->getDescricao() . "';";

        $conexao = $this->ConexaoMySQL->abrirBanco();

        if ($conexao->query($cadastrar)) {

            $retorno = true;
        } else {
            echo mysqli_error($conexao);
        }

        return $retorno;

        $this->ConexaoMySQL->fecharBanco();
    }

    // Método responsável por consultar a categoria pelo id
    public function consultarCategoria($idCategoria) {

        $consultar = "SELECT * FROM CATEGORIA WHERE CATEGORIA.ID = " . $idCategoria . ";";

        $conexao = $this->ConexaoMySQL->abrirBanco();
        $resultado = $conexao->query($consultar);

        if ($resultado->num_rows > 0) {

            while ($linha = $resultado->fetch_assoc()) {

                $Categoria = new Categoria();

                $Categoria->setId($linha['ID']);
                $Categoria->setNome($linha['NOME']);
                $Categoria->setDescricao($linha['DESCRICAO']);
            }
        } else {
            $Categoria = false;
        }

        $this->ConexaoMySQL->fecharBanco();

        return $Categoria;
    }

    // Método responsável por listar a(s) categoria(s)
    public function listarCategorias() {

        $consultar = "SELECT CATEGORIA.ID, CATEGORIA.NOME FROM CATEGORIA;";

        $conexao = $this->ConexaoMySQL->abrirBanco();
        $resultado = $conexao->query($consultar);

        if ($resultado->num_rows > 0) {

            $i = 0;
            while ($linha = $resultado->fetch_assoc()) {
                $Categoria = new Categoria();

                $Categoria->setId($linha['ID']);
                $Categoria->setNome($linha['NOME']);

                $Categorias[$i] = $Categoria;

                $i++;
            }
        } else {
            $Categorias = false;
        }

        $this->ConexaoMySQL->fecharBanco();

        return $Categorias;
    }

    // Método responsável pela alteração da categoria
    public function alterarCategoria($Categoria) {
        $retorno = false;

        $alterar = "UPDATE CATEGORIA SET NOME = '" . $Categoria->getNome() . "', DESCRICAO = '" . $Categoria->getDescricao() . "' WHERE ID = " . $Categoria->getId() . ";";

        $conexao = $this->ConexaoMySQL->abrirBanco();

        if ($conexao->query($alterar)) {

            $retorno = true;
        } else {
            echo mysqli_error($conexao);
        }

        $this->ConexaoMySQL->fecharBanco();

        return $retorno;
    }

    // Método responsável pela exclusão da categoria
    public function excluirCategoria($idCategoria) {
        $retorno = false;

        $deletar = "DELETE CATEGORIA WHERE ID = " . $idCategoria . "";

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

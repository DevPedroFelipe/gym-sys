<?php

    namespace src;

    class Categoria {

        // Atributos
        private $id;
        private $nome;
        private $descricao;

        // Método Construtor
        public function __construct() {

        }

        // Métodos Get e Set
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            $this->nome  = $nome;
        }

        public function getDescricao() {
            return $this->descricao;
        }

        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }

    }

?>
<?php

    namespace src;
    
    class Usuario {
        
        // Atributos
        private $id;
        private $nome;
        private $login;
        private $senha;
        private $perfil;
        private $email;
        private $dataCadastro;
        
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
            $this->nome = $nome;
        }

        public function getLogin() {
            return $this->login;
        }

        public function setLogin($login) {
            $this->login = $login;
        }

        public function getSenha() {
            return $this->senha;
        }

        public function setSenha($senha) {
            $this->senha = $senha;
        }

        public function getPerfil() {
            return $this->perfil;
        }

        public function setPerfil($perfil) {
            $this->perfil = $perfil;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function getDataCadastro() {
            return $this->dataCadastro;
        }

        public function setDataCadastro($dataCadastro) {
            $this->dataCadastro = $dataCadastro;
        }

    }
?>
<?php

    namespace src;
    
    class Usuario {
        
        // Atributos
        private $id;
        private $nomeCompleto;
        private $login;
        private $senha;
        private $perfil;
        private $email;
        private $status;
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

        public function getNomeCompleto() {
            return $this->nomeCompleto;
        }

        public function setNomeCompleto($nomeCompleto) {
            $this->nomeCompleto = $nomeCompleto;
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

        public function getStatus() {
            return $this->status;
        }

        public function setStatus($status) {
            $this->status = $status;
        }

        public function getDataCadastro() {
            return $this->dataCadastro;
        }

        public function setDataCadastro($dataCadastro) {
            $this->dataCadastro = $dataCadastro;
        }

    }
?>
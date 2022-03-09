<?php 

    namespace src;

    class Cliente {
        
        // Atributos
        private $id;
        private $Categoria;
        private $nomeCompleto;
        private $dataNascimento;
        private $cpf;
        private $sexo;
        private $email;
        private $telefone;
        private $observacao;
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

        public function getCategoria() {
            return $this->Categoria;
        }

        public function setCategoria($Categoria) {
            $this->Categoria = $Categoria;
        }

        public function getNomeCompleto() {
            return $this->nomeCompleto;
        }

        public function setNomeCompleto($nomeCompleto) {
            $this->nomeCompleto = $nomeCompleto;
        }

        public function getDataNascimento() {
            return $this->dataNascimento;
        }

        public function setDataNascimento($dataNascimento) {
            $this->dataNascimento = $dataNascimento;
        }

        public function getCpf() {
            return $this->cpf;
        }

        public function setCpf($cpf) {
            $this->cpf = $cpf;
        }

        public function getSexo() {
            return $this->sexo;
        }

        public function setSexo($sexo) {
            $this->sexo = $sexo;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            $this->email = $email; 
        }

        public function getTelefone() {
            return $this->telefone;
        }

        public function setTelefone($telefone) {
            $this->telefone = $telefone;
        }

        public function getObservacao() {
            return $this->observacao;
        }

        public function setObservacao($observacao) {
            $this->observacao = $observacao;
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
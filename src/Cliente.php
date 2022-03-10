<?php 

    namespace src;

    class Cliente {
        
        // Atributos
        private $id;
        private $Categoria;
        private $nome;
        private $dataNascimento;
        private $cpf;
        private $sexo;
        private $email;
        private $telefone;
        private $observacao;
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

        public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            $this->nome = $nome;
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

        public function getDataCadastro() {
            return $this->dataCadastro;
        }

        public function setDataCadastro($dataCadastro) {
            $this->dataCadastro = $dataCadastro;
        }

    }

?>
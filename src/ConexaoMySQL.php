<?php

    namespace src;
	
	use mysqli;
	
	class ConexaoMySQL {
		
	    private $db = "GENIUS";
	    private $user  = "root";
	    private $pass  = "";
	    private $server = "localhost";
	    private $connection = null;
	    
	    public function __construct(){
	        
	    }
	
		public function abrirBanco(){

		    $this->connection = new mysqli($this->server, $this->user, $this->pass, $this->db);
		    
		    $this->connection->set_charset("UTF-8");

            return mysqli_connect_errno() ? "Erro ao conectar com o banco de dados: " . mysqli_connect_error() : $this->conexao;
			
		}
	
		public function fecharBanco(){
			
			$this->connection->close();
			
		}
	}
?>
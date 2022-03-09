<?php

    namespace src;
	
	use mysqli;
	
	class ConexaoMySQL {
		
	    private $db = "FORCADOHABITO";
	    private $user  = "root";
	    private $pass  = "123456";
	    private $server = "127.0.0.1";
	    private $connection = null;
	    
	    public function __construct(){
	        
	    }
	
		public function abrirBanco(){

		    $this->connection = new mysqli($this->server, $this->user, $this->pass, $this->db);
		    
		    $this->connection->set_charset("UTF-8");

            return mysqli_connect_errno() ? "Erro ao conectar com o banco de dados: " . mysqli_connect_error() : $this->connection;
			
		}
	
		public function fecharBanco(){
			
			$this->connection->close();
			
		}
	}
?>
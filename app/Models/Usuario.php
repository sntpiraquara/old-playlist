<?php  

namespace App\Models;

class Usuario
{
	public $nome;
	public $email;
	public $senha;
	
	function __construct(){
		global $db;
		$this->db = $db;
		global $log;
		$this->log = $log;
	}

	public function existe(){
		$query = $this->db->query("SELECT * FROM usuarios WHERE email='{$this->email}' AND senha='{$this->senha}';");
		if (!$query) {
			$this->log->write($this->db->error);
			return false;
		}
		if($query->num_rows != 0){
			return true;
		}
	}
	
	public function emailExiste(){
		$sql = "SELECT * FROM usuarios WHERE email='{$this->email}';";
		$query = $this->db->query($sql);

		if (!$query) {
			$this->log->write($this->query->error);
		}

		if ($query->num_rows != 0) {
			return true;
		}
		return false;
	}
	public function cadastrar(){
		$sql = "INSERT INTO 
		usuarios (nome, email, senha)
		VALUES ('{$this->nome}' , '{$this->email}','{$this->senha}');";
		$query =$this->db->query($sql);

		if (!$query) {
			$this->log->write($this->query->error);	
			return false;
		}
		return true;
	}
}
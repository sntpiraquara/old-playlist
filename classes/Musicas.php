<?php  


class Musica
{

	public $nome;
	public $artista;
	public $tipo; 

	
	function __construct(){
		global $db;
		$this->db = $db;
	}

	public function cadastrar(){
		$sql = "INSERT INTO playlist (nome , artista, tipo) 
		VALUES ('{$this->nome}' , '{$this->artista}' , '{$this->tipo}');";
		$query = $this->db->query($sql);

		if (!query) {
			$_SESSION['aviso'] = $this->db->error;
		}
		return true;
	}

	public function existe(){
		$sql = "SELECT nome FROM playlist WHERE nome = '$this->nome';";
		$query = $this->db->query($sql);

		if ($query->num_rows > 0) {
			return true;
		}
		return false;
	}

	public function gerar(){
		$rows = [];

		$sql = "SELECT nome FROM playlist WHERE tipo = 'agitada' ORDER BY RAND() LIMIT 2";
		$query = $this->db->query($sql);

		if ($query) {
			while ($row = $query->fetch_object()) {
				$rows[] = $row;
			}

		}

		$sql = "SELECT nome FROM playlist WHERE tipo = 'transicao' ORDER BY RAND() LIMIT 1";
		$query = $this->db->query($sql);

		if ($query) {
			while ($row = $query->fetch_object()) {
				$rows[] = $row;
			}

		}

		$sql = "SELECT nome FROM playlist WHERE tipo = 'adoracao' ORDER BY RAND() LIMIT 1";
		$query = $this->db->query($sql);

		if ($query) {
			while ($row = $query->fetch_object()) {
				$rows[] = $row;
			}

		}
		return $rows;

	}

	public function all(){
		$sql = "SELECT * FROM playlist ORDER BY nome;";
		$query = $this->db->query($sql);

		$rows = [];
		if ($query) {
			while ($row = $query->fetch_object()) {
				$rows[] = $row;
			}
		}
		return $rows;
	}
}
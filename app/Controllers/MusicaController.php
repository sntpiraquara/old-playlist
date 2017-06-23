<?php 
namespace App\Controllers;

use App\Models\Musica;

class MusicaController{
	public function cadastrar(){
		$musica = new Musica;
		$musica->nome    = $_POST['nome'];
		$musica->artista = $_POST['artista'];
		$musica->tipo    = $_POST['tipo'];

		if (empty($musica->nome) && empty($musica->artista)) {
			$_SESSION['aviso'] = "campos vazios!";
			redirect("index.php");
		} else if ($musica->existe()) {
			$_SESSION['aviso'] = "esta musica já existe, tente outra!";
			redirect("index.php");
		} else if (!$musica->cadastrar()) {
			$_SESSION['aviso'] = "musica não cadastrada!";
			redirect("index.php");
		}

		$_SESSION['aviso'] = "musica cadastrada!";
		redirect("index.php");
	}
	public function editar(){
		$musica = new Musica;
		$id              = $_POST['id'];
		$musica->nome    = $_POST['nome'];
		$musica->artista = $_POST['artista'];
		$musica->tipo    = $_POST['tipo'];

		if (!$musica->editar($id)) {
			$_SESSION['aviso'] = "musica não pode ser editada!";
		}else{
			$musica->editar($id);
		}
		$url = 'index.php';
		if (isset($_SESSION['order'])) {
			$url .= "?by=" . $_SESSION['order'];
		}
		redirect($url);
	}
	public function excluir(){
		$musica = new Musica;
		$id = $_GET['id'];
		$musica->excluir($id);
		redirect("index.php");
	}
	public function order()
	{
		$musicas = new Musica;
		$order = $_GET['by'];

		switch ($order) {
			case 'nome':
			$musicas->orderName();
			redirect("index.php");
			break;

			case 'artista':
			$musicas->orderArtist();
			redirect("index.php");
			break;

			case 'tipo':
			$musicas->orderType();
			redirect("index.php");
			break; 
		}
	}
	public function gerar()
	{
		if (isset($_POST['gerar'])) {

			$numAgit    = $_POST['agitada'];
			$numTrasnsi = $_POST['transicao'];
			$numAdor    = $_POST['adoracao'];
			if (empty($numAgit) || empty($numTrasnsi) || empty($numAdor)) {
				$_SESSION['empty'] = "esses campos não poder estar limpos!";
				redirect("index.php");
			}
			$musica = new Musica;
			$_SESSION['musicas'] = $musica->gerar($numAgit,$numTrasnsi,$numAdor);
			redirect("index.php");
		}
		if (isset($_POST['limpar'])) {
			unset($_SESSION['musicas']);
			redirect("index.php");
		}
	}

}
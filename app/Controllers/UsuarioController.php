<?php 

namespace App\Controllers;

use App\Models\Usuario;

class UsuarioController
{

	public function cadastrar(){
		$usuario = new Usuario;
		$usuario->nome   = $_POST['nome'];
		$usuario->email  = $_POST['email'];
		$usuario->senha  = $_POST['senha'];

		$dados = [
			'nome'  => $_POST['nome'],
			'email' => $_POST['email'],
			'senha' => $_POST['senha']
		];
		$regras = [
			'nome'  => 'preenchido',
			'email' => 'preenchido|email',
			'senha' => 'preenchido'
		];

		$erros = validacao($dados,$regras);

		if (count($erros) > 0) {
			$_SESSION['erros'] = $erros;
			redirect('cadastro.php');
		}

		if ($usuario->emailExiste()) {
			$_SESSION['error']['email'] = "E-mail já existe!";
			redirect("cadastro.php");
		}
		if (!$usuario->cadastrar()) {
			$_SESSION['cadAviso'] = "não foi possivel fazer o cadastro!";
		}else{
			$usuario->cadastrar();
		}
		redirect("login.php");
		$db->close();
	}

	public function login(){
		$usuario = new Usuario;
		$usuario->email  = $_POST['email'];
		$usuario->senha  = $_POST['senha'];

		$dados = [
		'email' => $usuario->email,
		'senha' => $usuario->senha
		];
		$regras = [
		'email' => 'preenchido|email',
		'senha' => 'preenchido'
		];

		$erros = validacao($dados,$regras);

		if (count($erros) > 0) {
			$_SESSION['erros'] = $erros;
			redirect('login.php');
		}
		$verificado = $usuario->existe();
		
		if (!$verificado) {
			$_SESSION["erro"]["email"] = 'usuario ou senha invalido!';
			redirect('login.php');
		}else{
			$_SESSION['logado'] = true;
			redirect("../index.php");
		}
		$db->close();
	}

	public function logout(){
		if (true == $_SESSION['logado']) {
			$_SESSION['logado'] = false;
			redirect("/usuarios/login.php");
		}
	}
}
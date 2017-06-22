<?php
include "../include/all2.php";

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
<?php

include "../include/all2.php";

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
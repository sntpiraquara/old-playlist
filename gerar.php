<?php  
include "include/all.php";

$musica = new Musica;

if (isset($_POST['gerar'])) {
	
$_SESSION['musicas'] = $musica->gerar();
redirect("index.php");
}

if (isset($_POST['limpar'])) {
	unset($_SESSION['musicas']);
	redirect("index.php");
}

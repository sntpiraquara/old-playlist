<?php  
include "include/all.php";


	
$numAgit = $_POST['agitada'];
$numTrasnsi = $_POST['transicao'];
$numAdor = $_POST['adoracao'];


$musica = new Musica;

$_SESSION['musicas'] = $musica->gerar($numAgit,$numTrasnsi,$numAdor);
redirect("index.php");


if (isset($_POST['limpar'])) {
	unset($_SESSION['musicas']);
	redirect("index.php");
}

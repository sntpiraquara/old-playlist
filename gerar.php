<?php  
include "include/all.php";


if (isset($_POST['gerar'])) {

    $numAgit = $_POST['agitada'];
    $numTrasnsi = $_POST['transicao'];
    $numAdor = $_POST['adoracao'];
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

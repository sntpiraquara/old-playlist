<?php
include "include/all.php";

if (!isset($_POST['nome'])) {
    exit("nao tem nada");
}

$musica = new Musica;

$musica->nome    = $_POST['nome'];
$musica->artista = $_POST['artista'];
$musica->tipo    = $_POST['tipo'];

if (empty($musica->nome) && empty($musica->artista)) {
    $_SESSION['aviso'] = "campos vazios!";
    redirect("index.php");
}else if ($musica->existe()) {
    $_SESSION['aviso'] = "esta musica já existe, tente outra!";
    redirect("index.php");
} else if (!$musica->cadastrar()) {
    $_SESSION['aviso'] = "musica não cadastrada!";
    redirect("index.php");
}
$_SESSION['aviso'] = "musica cadastrada!";
redirect("index.php");



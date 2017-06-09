<?php
include "include/all.php";

$musica = new Musica;

$musica->nome    = $_POST['nome'];
$musica->artista = $_POST['artista'];
$musica->tipo    = $_POST['tipo'];

if (isset($_POST['cadastrar'])) {

    if (empty($musica->nome) || empty($musica->artista)) {
        $_SESSION['aviso'] = "campos vazios!";
        redirect("index.php");
    }
    if ($musica->existe()) {
        $_SESSION['aviso'] = "esta musica já existe, tente outra!";
        redirect("index.php");
    } else if (!$musica->cadastrar()) {
        $_SESSION['aviso'] = "musica não cadastrada!";
        redirect("index.php");
    } else {
        $_SESSION['aviso'] = "musica cadastrada!";
        redirect("index.php");
    }
}

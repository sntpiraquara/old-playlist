<?php 

include 'include/all.php';

$id      = $_POST['id'];
$nome    = $_POST['nome'];
$artista = $_POST['artista'];
$tipo    = $_POST['tipo'];



$musica = new Musica;

$musica->nome = $nome;
$musica->artista = $artista;
$musica->tipo = $tipo;

if (!$musica->editar($id)) {
    $_SESSION['aviso'] = "musica não pode ser editada!";
    redirect("index.php");
}else{
$musica->editar($id);
redirect("index.php");
}

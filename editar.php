<?php 

include 'include/all.php';

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
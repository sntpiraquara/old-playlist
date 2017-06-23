<?php
$_SESSION['busca'] = [];
$title = "PlayList";
include "include/all.php";

if (!isset($_SESSION["logado"]) || true != $_SESSION["logado"]) {
    redirect('../usuarios/login.php');
}
// termo e order são uma string
$term = "";
$order = "";
$musica = new App\Models\Musica;
//ordem da lista de musicas por nome, tipo ou artista;
if (isset($_GET['by'])) {
    $order = $_GET['by'];
    $_SESSION['order'] = $order;
}
// termo para ficar fixado na pesquisa
if (isset($_SESSION['term'])) {
    $term = $_SESSION['term'];
}
// todas as musicas do banco de dados
$todas = $musica->all($order);
// se estiver definido a busca, verifica se a busca é true, se não for, mostra a lista com todas as musicas
if (isset($_POST['buscar'])) {
    $term = trim($_POST['search']);
    $busca = $musica->search($term);
    if (!$busca) {
    	$busca = $musica->all($order);
    	$_SESSION['alerta'] = "Musica não encontrada!";
    }
    $todas = $busca;
}
// fecha a busca e o termo
if (isset($_POST['fechar'])) {
    unset($_SESSION['busca']);
    unset($_SESSION['term']);
}
//se nao houver musicas na playList;
if (!isset($_SESSION['musicas'])) {
    $_SESSION['musicas'] = [];
}
// musicas vem em um array, para tabela do gerar playlist
$musicas = [];
$musicas = $_SESSION['musicas'];
// cabeçalho do index
include 'assets/header.php';
//  aqui as musicas são cadastradas 
include 'cadMusica.php';
//  aqui é gerada uma playlist
include 'gerarPlaylist.php'; 
// tabela de musicas cadastradas 
include 'tabelaMusicas.php'; 
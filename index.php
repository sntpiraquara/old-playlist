<?php
include "include/all.php";

$musica = new Musica;

//ordem da lista de musicas pot nomr,tipo ou artista;
if (isset($_GET['by'])) {

    $order= $_GET['by'];
    $_SESSION['order'] = $order;

    if ($order) {
        $todas = $musica->all($order);
    } 
}elseif (isset($_SESSION['order'])) {
    $order = $_SESSION['order'];
    $todas = $musica->all($order);
}else{
    $todas = $musica->all("id");
}

//se nao houver musicas na playList;
if (!isset($_SESSION['musicas'])) {
    $_SESSION['musicas'] = [];
}


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
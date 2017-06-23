<?php 
include "include/all.php";

$musicas = new App\Models\Musica;

$order = $_GET['by'];

switch ($order) {
    case 'nome':
        $musicas->orderName();
        redirect("index.php");
        break;

    case 'artista':
        $musicas->orderArtist();
        redirect("index.php");
        break;

    case 'tipo':
        $musicas->orderType();
        redirect("index.php");
        break; 
}



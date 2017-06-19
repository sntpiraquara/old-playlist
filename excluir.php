<?php 
include 'include/all.php';

$id = $_GET['id'];

$musica = new Musica;
$musica->excluir($id);
redirect("index.php");
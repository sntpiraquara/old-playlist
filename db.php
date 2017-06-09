<?php

global $db;

$db = new mysqli("localhost", "root", "123qwe", "playList");

if ($db->connect_errno) {
    exit('Não foi possível conectar a base de dados.');
}

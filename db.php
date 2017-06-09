<?php

global $db;
global $env;

$db = new mysqli(
    $env->get('DB_HOST', 'localhost'),
    $env->get('DB_USER', 'root'),
    $env->get('DB_PASSWORD', ''),
    $env->get('DB_DATABASE', 'playlist')
);

if ($db->connect_errno) {
    exit('Não foi possível conectar a base de dados.');
}

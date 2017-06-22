<?php

global $db;
global $env;
global $Log;

$db = new mysqli(
    $env->get('DB_HOST', 'localhost'),
    $env->get('DB_USER', 'root'),
    $env->get('DB_PASSWORD', ''),
    $env->get('DB_DATABASE', 'playlist'),
    $env->get('DB_PORT', '3306')
);

if ($db->connect_errno) {
    $Log->write($db->connect_error);

    exit("Não foi possível conectar a base de dados.");

}

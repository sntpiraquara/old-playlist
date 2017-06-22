<?php
session_start();
include "../util/Log.php";
include "functions.php";
include '../util/Env.php';

global $Log;
$Log = new Log;

global $env;
$env = new Env(base_path('.env'));

include "../db.php";

// Models
include "../classes/Musicas.php";
include "../classes/Usuarios.php";

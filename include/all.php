<?php
session_start();
session_destroy();

include "functions.php";
include './util/Env.php';

global $env;
$env = new Env(base_path('.env'));

include "./db.php";

// Models
include "./classes/Musicas.php";

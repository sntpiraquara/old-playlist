<?php
session_start();
$path = dirname(__DIR__);
require $path . '/vendor/autoload.php';

include $path . "/include/functions.php";

global $Log;
$Log = new App\Util\Log;

global $env;
$env = new App\Util\Env(base_path('.env'));

include $path . "/db.php";

<?php
function redirect($local)
{
    header("location:$local");
    exit;
}

function dd($arquivo)
{
    echo "<pre>";
    var_dump($arquivo);
    echo "</pre>";
    exit;
}

function base_path($destination)
{
    $path = dirname(__DIR__) . '/';
    return $path . $destination;
}

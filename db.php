<?php 

global $db;

$db = new mysqli("localhost" , "root" , "123qwe" , "playList");


if ($db->connect_errno) {
   header("location:ops.php");
}


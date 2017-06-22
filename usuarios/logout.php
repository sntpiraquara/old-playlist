<?php
include '../include/all2.php';

if (true == $_SESSION['logado']) {
	$_SESSION['logado'] = false;
	redirect("/usuarios/login.php");
}
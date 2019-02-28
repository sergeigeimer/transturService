<?php
	include_once "../function.php";
	$login = $_REQUEST['login'];
	$pass = $_REQUEST['pass'];
	print($login + ' ' + $pass);
?>
<?php
	//Example /admin/post/add.php?id=ID&name=POSTNAME + login string
	include_once "../../function.php";
	$link = db_connect();
	$id = $_REQUEST['id'];
	$postname = $_REQUEST['name'];
	$logon = db_login($_REQUEST['login'], $_REQUEST['pass'], $link, "Администратор");
	if($link && $logon){
		$sqltext="UPDATE Posts SET PostName='".$postname."' WHERE ID = ".$id."";
		$query=sqlsrv_query($link, $sqltext);
		if($query){
			print('Good');
		}
		else
			print('Error');
	}
	
?>
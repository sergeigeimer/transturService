<?php
	//Example /admin/post/add.php?name=POSTNAME + login string
	include_once "../../function.php";
	$postname = $_REQUEST['name'];
	$link = db_connect();
	$logon = db_login($_REQUEST['login'], $_REQUEST['pass'], $link, "Администратор");
	if($link && $logon){
		$sqltext="INSERT INTO Posts(PostName) VALUES ('".$postname."')";
		$query=sqlsrv_query($link, $sqltext);
		if($query){
			print('Good');
		}
		else
			print('Error');
	}
	
?>
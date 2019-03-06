<?php
	//Example /admin/post/add.php?name=POSTNAME
	include_once "../../function.php";
	$postname = $_REQUEST['name'];
	$link = db_connect();
	if($link){
		$sqltext="INSERT INTO Posts(PostName) VALUES ('".$postname."')";
		$query=sqlsrv_query($link, $sqltext);
		if($query){
			print('Good');
		}
		else
			print('Error');
	}
	
?>
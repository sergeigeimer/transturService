<?php
	//Example /admin/post/add.php?id=ID&name=POSTNAME
	include_once "../../function.php";
	$id = $_REQUEST['id'];
	$postname = $_REQUEST['name'];
	$link = db_connect();
	if($link){
		$sqltext="UPDATE Posts SET PostName='".$postname."' WHERE ID = ".$id."";
		$query=sqlsrv_query($link, $sqltext);
		if($query){
			print('Good');
		}
		else
			print('Error');
	}
	
?>
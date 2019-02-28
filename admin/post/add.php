<?php
	//Example /admin/post/add.php?name=POSTNAME
	include_once "../../function.php";
	$PostName = $_REQUEST['name'];
	$link = db_connect();
	if($link){
		$sqltext="INSERT INTO Posts VALUES (NULL, '".$PostName."')";
		$query=sqlsrv_query($link, $sqltext);		
		if($query){
			print('Error');
		}
		else
		{
			print('Good');
		}
	}
	
?>
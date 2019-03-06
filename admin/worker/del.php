<?php
	//Example /admin/post/del.php?id=ID
	include_once "../../function.php";
	$id = $_REQUEST['id'];
	$link = db_connect();
	if($link){
		$sqltext="SELECT ID FROM Posts WHERE ID = ".$id."";
		$query=sqlsrv_query($link, $sqltext);
		$array=sqlsrv_fetch_array($query);
		if($array!=NULL){
			$sqltext="DELETE FROM Posts WHERE ID = ".$id."";
			$query=sqlsrv_query($link, $sqltext);
			if($query)
				print('Good');
			else
				print('Error');
		}
		else
			print('NotExist');		
	}
	
?>
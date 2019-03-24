<?php
	//Example /admin/worker/del.php?id=ID
	include_once "../../function.php";
	$id = $_REQUEST['id'];
	$link = db_connect();
	if($link){
		$sqltext="SELECT ID FROM Workers WHERE ID = ".$id."";
		$query=sqlsrv_query($link, $sqltext);
		$array=sqlsrv_fetch_array($query);
		if($array!=NULL){
			$sqltext="DELETE FROM Workers WHERE ID = ".$id."";
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
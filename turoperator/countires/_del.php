<?php
	//Example /turoperator/tours/del.php?id=ID + login string
	include_once "../../function.php";
	$id = $_REQUEST['id'];
	$link = db_connect();
	$logon = db_login($_REQUEST['login'], $_REQUEST['pass'], $link, "Туроператор");
	if($link && $logon){
		$sqltext="SELECT ID FROM Tours WHERE ID = ".$id."";
		$query=sqlsrv_query($link, $sqltext);
		$array=sqlsrv_fetch_array($query);
		if($array!=NULL){
			$sqltext="DELETE FROM Tours WHERE ID = ".$id."";
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
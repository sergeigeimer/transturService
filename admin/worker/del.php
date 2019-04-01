<?php
	//Example /admin/worker/del.php?id=ID + login string
	include_once "../../function.php";
	$id = $_REQUEST['id'];
	$link = db_connect();
	$logon = db_login($_REQUEST['login'], $_REQUEST['pass'], $link, "Администратор");
	if($link && $logon){
		$sqltext="SELECT ID, Login FROM Workers WHERE ID = ".$id."";
		$query=sqlsrv_query($link, $sqltext);
		$array=sqlsrv_fetch_array($query);
		if($array!=NULL){
			if($array[1]!=$_REQUEST['login']){
				$sqltext="DELETE FROM Workers WHERE ID = ".$id."";
				$query=sqlsrv_query($link, $sqltext);
				if($query)
					print('Good');
				else
					print('Error');
			} else 
				print('ErrorSelf');			
		}
		else
			print('NotExist');		
	}
	
?>
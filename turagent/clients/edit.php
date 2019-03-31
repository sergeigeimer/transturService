<?php
	//Example /touragent/clients/edit.php?id=ID&paramName=PARAMNAME&paramValue=PARAMVALUE + login string
	include_once "../../function.php";
	$link = db_connect();
	$id = $_REQUEST['id'];
	$paramName = $_REQUEST['paramName'];
	$paramValue = $_REQUEST['paramValue'];
	$logon = db_login($_REQUEST['login'], $_REQUEST['pass'], $link, "Турагент");
	if($link && $logon){
		$sqltext="UPDATE Clients SET ".$paramName."='".$paramValue."' WHERE ID = ".$id."";
		$query=sqlsrv_query($link, $sqltext);
		if($query){
			print('Good');
		}
		else
			print('Error');
	}
	
?>
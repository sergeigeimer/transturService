<?php
	//Example /admin/post/get.php
	include_once "../../function.php";
	$link = db_connect();
	$logon = db_login($_REQUEST['login'], $_REQUEST['pass'], $link, "Администратор");
	if($link && $logon){
		$sqltext="SELECT ID, PostName FROM Posts";
		$query=sqlsrv_query($link, $sqltext);
		if($query){
			while ($row = sqlsrv_fetch_array($query)){
				print($row['ID'].'|'.$row['PostName']."<br/>");
			}
		}
		else
			print('Error');
	}
	
?>
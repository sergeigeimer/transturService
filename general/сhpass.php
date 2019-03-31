<?php
	//Example /all/personal/edit.php?newPass=PARAMVALUE + login string1
	include_once "../function.php";
	$link = db_connect();
	$newPass = $_REQUEST['newPass'];
	$logon = db_login($_REQUEST['login'], $_REQUEST['pass'], $link, "All");
	if($link && $logon){
		$sqltext="SELECT ID, Login, PassSHA1 FROM Workers WHERE Login = ".$_REQUEST['login']." AND PassSHA1 = ".$_REQUEST['pass'];
		$query=sqlsrv_query($link, $sqltext);
		$array=sqlsrv_fetch_array($query);
		if($array!=NULL){
			$sqltext="UPDATE Workers SET ".$."='".$paramValue."' WHERE ID = ".$array[0];
			print($sqltext);
			// $query=sqlsrv_query($link, $sqltext);
			// if($query){
			// print('Good');
			// }
			// else
				// print('Error');
		} else
			print("NotExist");
	}
	
?>
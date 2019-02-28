<?php
	//Example /admin/login.php?login=LOGIN&pass=PASSSHA1
	include_once "../function.php";
	$login = $_REQUEST['login'];
	$pass = $_REQUEST['pass'];
	$link = db_connect();
	if($link){
		$sqltext="SELECT IDPost, Login, PassSHA1 FROM Workers WHERE Login = '".$login."' AND PassSHA1 = '".$pass."'";
		$query=sqlsrv_query($link, $sqltext);
		$array=sqlsrv_fetch_array($query);
		
		if($array==NULL)
			print('Not found');
		else
			print($array[0]);
	}
?>
<?php
	//Example /admin/login.php?login=LOGIN&pass=PASSSHA1
	include_once "function.php";
	$login = $_REQUEST['login'];
	$pass = $_REQUEST['pass'];
	$link = db_connect();
	if($link){
		$sqltext="SELECT IDPost, FirstName, LastName, Login, PassSHA1  FROM Workers WHERE Login = '".$login."' AND PassSHA1 = '".$pass."'";
		$queryWorkers=sqlsrv_query($link, $sqltext);
		$array=sqlsrv_fetch_array($queryWorkers);
		
		if($array==NULL)
			print('404');
		else
		{
			$firstname=$array[1];
			$lastname=$array[2];
			$sqltext="SELECT PostName, ID FROM Posts WHERE ID = '".$array[0]."'";
			$queryPosts=sqlsrv_query($link, $sqltext);
			$array=sqlsrv_fetch_array($queryPosts);
			if($array==NULL){
				print('404');
			}
			else
			{
				print($array[0].'|'.$lastname.'|'.$firstname);
			}
		}
			
	}
?>
<?php
	//Example /admin/post/get.php + login string
	$table = "PayConst";
	$post = "Бухгалтер";
	include_once "../../function.php";
	$link = db_connect();
	$logon = db_login($_REQUEST['login'], $_REQUEST['pass'], $link, $post);
	if($link && $logon){
		$sqltext="SELECT TOP(1) * FROM ".$table." ORDER BY DateEdit DESC";
		$query=sqlsrv_query($link, $sqltext);
		if($query){
			while ($row = sqlsrv_fetch_array($query)){
				for($i=0;$i<=(count($row)/2-1);$i++)
				{
					if($i<(count($row)/2-1))
						print($row[$i].'|');
					else
						print($row[$i]);
				}
				$exist = True;
			}
			if(!$exist)
				print("NotExist");
		}
		else
			print('Error');
	}
	
?>
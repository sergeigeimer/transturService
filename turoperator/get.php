<?php
	//Example /admin/turoperator/get.php?db=DB + login string
	include_once "../function.php";
	$link = db_connect();
	$logon = db_login($_REQUEST['login'], $_REQUEST['pass'], $link, "Туроператор");
	if($link && $logon){
		$sqltext="SELECT * FROM ".$_REQUEST['db']."";
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
				print(";");
			}
		}
		else
			print('Error');
	}
	
?>
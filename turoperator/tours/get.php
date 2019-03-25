<?php
	//Example /admin/turoperator/tours/get.php?paramName=PARANAME&paramValue=PARAMVALUE + login string
	include_once "../../function.php";
	$link = db_connect();
	$logon = db_login($_REQUEST['login'], $_REQUEST['pass'], $link, "Туроператор");
	if($link && $logon){
		if($_REQUEST['paramName']==NULL || $_REQUEST['paramValue']==NULL)
			$sqltext="SELECT * FROM Tours";
		else
			$sqltext="SELECT * FROM Tours WHERE ".$_REQUEST['paramName']." = '".$_REQUEST['paramValue']."'";
		print ($sqltext);
		$query=sqlsrv_query($link, $sqltext);
		if($query){
			if(count(sqlsrv_fetch_array($query))==0)
				print("NotExist");
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
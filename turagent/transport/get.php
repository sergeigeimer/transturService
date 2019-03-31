<?php
	//Example /admin/turoperator/transpot/get.php?paramName=PARANAME&paramValue=PARAMVALUE + login string
	include_once "../../function.php";
	$link = db_connect();
	$logon = db_login($_REQUEST['login'], $_REQUEST['pass'], $link, "Турагент");
	if($link && $logon){
		if($_REQUEST['paramName']==NULL || $_REQUEST['paramValue']==NULL)
			$sqltext="SELECT * FROM TypeOfTransports";
		else
			$sqltext="SELECT * FROM TypeOfTransports WHERE ".$_REQUEST['paramName']." = '".$_REQUEST['paramValue']."'";
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
				$exist = True;
			}
			if(!$exist)
				print("NotExist");
		}
		else
			print('Error');
	}
	
?>
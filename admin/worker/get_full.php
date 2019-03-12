<?php
	//Example /admin/post/get.php
	include_once "../../function.php";
	$link = db_connect();
	if($link){
		$sqltext="SELECT * FROM Workers";
		$query=sqlsrv_query($link, $sqltext);
		if($query){
			while ($row = sqlsrv_fetch_array($query)){
				for($i=0;$i<=(count($row)/2);$i++)
				{
					print($row[$i].'|');
				}
				print("<br/>");
			}
		}
		else
			print('Error');
	}
	
?>
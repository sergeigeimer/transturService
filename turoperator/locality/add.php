<?php
	//Example /admin/turoperator/countires/add.php?string=STRING + login string
	include_once "../../function.php";
	$string = $_REQUEST['string'];
	$link = db_connect();
	$logon = db_login($_REQUEST['login'], $_REQUEST['pass'], $link, "Туроператор");
	if($link && $logon){
		$parsedstring=explode("|",$string);
		$stringForSQL=$stringForSQL."'".$parsedstring[0]."', '".$parsedstring[1]."'";
		$sqltext="INSERT INTO Locality(IDCountry, NameOFLocality) VALUES (".$stringForSQL.")";
		$query=sqlsrv_query($link, $sqltext);
		if($query){
			print('Good');
		}
		else
			print('Error');
	}
	
?>
<?php
	//Example /admin/worker/add.php?string=STRING + login string
	include_once "../../function.php";
	$string = $_REQUEST['string'];
	$link = db_connect();
	$logon = db_login($_REQUEST['login'], $_REQUEST['pass'], $link, "Турагент");
	if($link && $logon){
		$parsedstring=explode("|",$string);
		$stringForSQL="'".explode(" ",$parsedstring[0])[0]."T".explode(" ",$parsedstring[0])[1]."', ";
		for($i=1;$i<=9;$i++){
			$stringForSQL=$stringForSQL."'".$parsedstring[$i]."'".", ";
		}
		$stringForSQL=$stringForSQL."'".$parsedstring[10]."'";
		$sqltext="INSERT INTO Clients(DateOfContract, IDWorker, LastName, FirstName, Patronymic, DateOfBirth, PassportNumber, PassportIssuedBy, PassportIssuedDate, IDTour, ProcentForWorker) VALUES (".$stringForSQL.")";
		$query=sqlsrv_query($link, $sqltext);
		if($query){
			print('Good');
		}
		else
			print('Error');
	}
	
?>
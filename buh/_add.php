<?php
	//Example /admin/worker/add.php?string=STRING + login string
	include_once "../../function.php";
	$string = $_REQUEST['string'];
	$link = db_connect();
	$logon = db_login($_REQUEST['login'], $_REQUEST['pass'], $link, "Администратор");
	if($link && $logon){
		$parsedstring=explode("|",$string);
		$stringForSQL="'".explode(" ",$parsedstring[0])[0]."T".explode(" ",$parsedstring[0])[1]."', ";
		for($i=1;$i<=19;$i++){
			$stringForSQL=$stringForSQL."'".$parsedstring[$i]."'".", ";
		}
		$stringForSQL=$stringForSQL."'".$parsedstring[20]."'";
		$sqltext="INSERT INTO Workers(DateOfContract, Login, PassSHA1, IDPost, LastName, FirstName, Patronymic, DataOfBirth, PassportNumber, PassportIssuedBy, PassportIssuedDate,  RegAddress, FactAddress, INN, SNILS, Bank, BankAccountNumber, BankBIK, BankCorrespondentAccount, BankExt, MinPay) VALUES (".$stringForSQL.")";
		$query=sqlsrv_query($link, $sqltext);
		if($query){
			print('Good');
		}
		else
			print('Error');
	}
	
?>
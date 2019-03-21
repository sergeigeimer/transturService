<?php
	//Example /admin/post/add.php?string=POSTNAME
	include_once "../../function.php";
	$string = $_REQUEST['string'];
	$logon = db_login($_REQUEST['login'], $_REQUEST['pass'], $link, "Администратор");
	if($link && $logon){
		$parsedstring=explode("|",$string);
		$stringForSQL="'".explode(" ",$parsedstring[1])[0]."T".explode(" ",$parsedstring[1])[1]."', ";
		for($i=2;$i<=20;$i++){
			$stringForSQL=$stringForSQL."'".$parsedstring[$i]."'".", ";
		}
		$stringForSQL=$stringForSQL."'".$parsedstring[21]."'";
		$sqltext="INSERT INTO Workers(DateOfContract, Login, PassSHA1, IDPost, LastName, FirstName, Patronymic, DataOfBirth, PassportNumber, PassportIssuedBy, PassportIssuedDate,         RegAddress, FactAddress, INN, SNILS, Bank, BankAccountNumber, BankBIK, BankCorrespondentAccount, BankExt, MinPay) VALUES (".$stringForSQL.")";
		$query=sqlsrv_query($link, $sqltext);
		if($query){
			print('Good');
		}
		else
			print('Error');
	}
	
?>
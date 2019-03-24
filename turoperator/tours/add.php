<?php
	//Example /admin/turoperator/tours/add.php?string=STRING + login string
	include_once "../../function.php";
	$string = $_REQUEST['string'];
	$link = db_connect();
	$logon = db_login($_REQUEST['login'], $_REQUEST['pass'], $link, "Туроператор");
	if($link && $logon){
		$parsedstring=explode("|",$string);
		for($i=0;$i<=4;$i++){
			$stringForSQL=$stringForSQL."'".$parsedstring[$i]."'".", ";
		}
		$stringForSQL=$stringForSQL."'".explode(" ",$parsedstring[5])[0]."T".explode(" ",$parsedstring[5])[1]."', ";
		$stringForSQL=$stringForSQL."'".explode(" ",$parsedstring[6])[0]."T".explode(" ",$parsedstring[6])[1]."', ";
		for($i=7;$i<14;$i++){
			$stringForSQL=$stringForSQL."'".$parsedstring[$i]."'".", ";
		}
		$stringForSQL=$stringForSQL."'".$parsedstring[14]."'";
		$sqltext="INSERT INTO Tours(NameTur, IDCountry, IDLocality, IDTypeOfTransport, InfoAboutDepPoint, DateStart, DateEnd, NameHotel, CountStars, PriceHotel, NumNight, TripPrice, IsVisa, IDTypeFood, MaxCountClients) VALUES (".$stringForSQL.")";
		$query=sqlsrv_query($link, $sqltext);
		if($query){
			print('Good');
		}
		else
			print('Error');
	}
	
?>
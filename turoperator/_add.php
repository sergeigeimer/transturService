<?php
	//Example /admin/turoperator/add.php?string=STRING + login string
	include_once "../function.php";
	$string = $_REQUEST['string'];
	$link = db_connect();
	$logon = db_login($_REQUEST['login'], $_REQUEST['pass'], $link, "Туроператор");
	if($link && $logon){
		$parsedstring=explode("|",$string);
		for($i=0;$i<=5;$i++){
			$stringForSQL=$stringForSQL."'".$parsedstring[$i]."'".", ";
		}
		$stringForSQL=$stringForSQL."'".explode(" ",$parsedstring[6])[0]."T".explode(" ",$parsedstring[6])[1]."', ";
		$stringForSQL=$stringForSQL."'".explode(" ",$parsedstring[7])[0]."T".explode(" ",$parsedstring[7])[1]."', ";
		for($i=8;$i<=14;$i++){
			$stringForSQL=$stringForSQL."'".$parsedstring[$i]."'".", ";
		}
		$stringForSQL=$stringForSQL."'".$parsedstring[15]."'";
		print($stringForSQL);
		// $sqltext="INSERT INTO Workers(NameTur, IDCountry, IDLocality, IDTypeOfTransport, InfoAboutDepPoint, DateStart, DateEnd, NameHotel, CountStars, PriceHotel, NumNight, TripPrice, IsVisa, IDTypeFood, MaxCountClients) VALUES (".$stringForSQL.")";
		// $query=sqlsrv_query($link, $sqltext);
		// if($query){
			// print('Good');
		// }
		// else
			// print('Error');
	}
	
?>
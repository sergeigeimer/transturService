<?php
	//Example /admin/worker/add.php?string=STRING + login string
	include_once "../../function.php";
	date_default_timezone_set('Asia/Yekaterinburg');
	$date = date("Y-m-d H:i:s");
	$dateParse = explode(" ", $date);
	$date = $dateParse[0]."T".$dateParse[1];
	print($date);
	$string = $_REQUEST['string'];
	$link = db_connect();
	$logon = db_login($_REQUEST['login'], $_REQUEST['pass'], $link, "Бухгалтер");
	if($link && $logon){
		$parsedstring=explode("|",$string);
		$stringforsql="'".$date."', ";
		for($i=0;$i<=2;$i++){
			$stringforsql=$stringforsql."'".$parsedstring[$i]."'".", ";
		}
		$stringforsql=$stringforsql."'".$parsedstring[3]."'";
		$sqltext="insert into PayConst(DateEdit, NDS, NDFL, ProcentForWorker, ProcentForCompany) values (".$stringforsql.")";
		print($sqltext);
		$query=sqlsrv_query($link, $sqltext);
		if($query){
			print('good');
		}
		else
			print('error');
	}
	
?>
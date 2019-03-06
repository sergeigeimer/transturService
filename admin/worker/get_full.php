<?php
	//Example /admin/post/get.php
	include_once "../../function.php";
	$link = db_connect();
	if($link){
		$sqltext="SELECT ID, DateOfContract, Login, IDPost, LastName, FirstName, Patronymic, DataOfBirth FROM Workers";
		$query=sqlsrv_query($link, $sqltext);
		if($query){
			while ($row = sqlsrv_fetch_array($query)){
				$id=$row['ID'];
				$DateOfContract=date_format($row['DateOfContract'], 'Y-m-d H:i:s');
				$Login=$row['Login'];
				$IDPost=$row['IDPost'];
				$LastName=$row['LastName'];
				$FirstName=$row['FirstName'];
				$Patronymic=$row['Patronymic'];
				$DataOfBirth=date_format($row['DataOfBirth'],'Y-m-d');
				
				print(
				$id.'|'.
				$IDPost.'|'.
				$LastName.'|'.
				$FirstName.'|'.
				$Patronymic.'|'.
				$DataOfBirth.'|'.
				$DateOfContract.'|'.
				$Login."<br/>");
			}
		}
		else
			print('Error');
	}
	
?>
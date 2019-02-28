<?php
	function debug($text) {
		$debug_mode = true;
		if ($debug_mode){
			echo '<script type="text/javascript">';
			echo 'console.log("'.$text.'");';
			echo '</script>';
		}    
	}
	
	function db_connect(){
		$serverName = "ALEXANDER-PC\MAIN";
		$connectionInfo = array( "Database"=>"TransTur", "UID"=>"sa", "PWD"=>"qwerty", "CharcterSet"=>"UTF-8");
		$link = sqlsrv_connect( $serverName, $connectionInfo);
		if (!$link){
			print('ERROR1:DB');
		}
		else {
			ini_set('default_charset','UTF-8');
			return $link;
		}
	}
	
	function add_record($link,$tblname){
		$sqltext = "INSERT INTO `test`.`".$tblname."` (`ID`, `FIO`, `Number`, `Adress`) VALUES (NULL, ` `, ` `, ` `)";
		$result = mysqli_query($link, $sqltext);
		$last = mysqli_insert_id($link);
		print "ID".$last;
		print $sqltext;
	}
?>
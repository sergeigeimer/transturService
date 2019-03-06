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
		$connectionInfo = array( "Database"=>"TransTur", "UID"=>"sa", "PWD"=>"qwerty", "CharacterSet" => "UTF-8");
		$link = sqlsrv_connect( $serverName, $connectionInfo);
		if (!$link){
			print('ERROR1:DB');
		}
		else {
			ini_set('default_charset','UTF-8');
			return $link;
		}
	}
?>
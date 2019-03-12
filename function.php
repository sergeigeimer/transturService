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
		include_once "conf.cfg";
		$link = sqlsrv_connect( $serverName, $connectionInfo);
		if (!$link){
			print('500');
		}
		else {
			ini_set('default_charset','UTF-8');
			return $link;
		}
	}
	function db_login($login, $pass){
		$sqltext="SELECT IDPost, Login, PassSHA1  FROM Workers WHERE Login = '".$login."' AND PassSHA1 = '".$pass."'";
		$queryWorkers=sqlsrv_query($link, $sqltext);
		$array=sqlsrv_fetch_array($queryWorkers);
		if($array!=NULL)
			return $array[0];
		else
			return 401;
	}
?>
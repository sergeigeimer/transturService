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
	function db_login($login, $pass, $link, $post){
		if($post=="True"){
			return true;
		}
		if($post=="All")
			$sqltext="SELECT Login, PassSHA1  FROM Workers WHERE Login = '".$login."' AND PassSHA1 = '".$pass."'";
			$queryWorkers=sqlsrv_query($link, $sqltext);
			$array=sqlsrv_fetch_array($queryWorkers);
			if($array!=NULL){
				return true;
			} else
			{
				print("401");
				return false;
			}
		if($login==NULL && $pass==NULL){
			print(401);
			return false;
		}
			
		$sqltext="SELECT IDPost, Login, PassSHA1  FROM Workers WHERE Login = '".$login."' AND PassSHA1 = '".$pass."'";
		$queryWorkers=sqlsrv_query($link, $sqltext);
		$array=sqlsrv_fetch_array($queryWorkers);
		if($array!=NULL){
			$sqltext="SELECT PostName, ID FROM Posts WHERE ID = '".$array[0]."'";
			$queryPosts=sqlsrv_query($link, $sqltext);
			$array=sqlsrv_fetch_array($queryPosts);
			if(($array!=NULL)&&($array[0]==$post)){
				return true;
			}
			else
			{
				print("401");
				return false;
			}
		}
		else
		{
			print("401");
			return false;
		}
	}
?>
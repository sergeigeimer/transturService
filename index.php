<?php
	include_once "function.php";
	if(db_connect()){
		print("It's works");
	} else {
		print("Something wrong!!!");
	}
?>
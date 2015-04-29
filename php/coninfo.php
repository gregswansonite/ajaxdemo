<?php
	$dbname="customers";
	$userdbname = "customers";
	$dbpassword = "customers";
	$hostname = "23.229.213.195";
	//SELECT A DATABASE TO WORK WITH 
	$dbhandle = mysql_connect($hostname, $userdbname, $dbpassword)or die("Could not connect:".mysql_error());	
	mysql_select_db($dbname,$dbhandle);
?>
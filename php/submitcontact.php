<?php
	include("coninfo.php");
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$recordToDelete = $_POST['recordToDelete'];
	//INSERT RECORD REQUEST - ADD A CONTACT
	if(isset($name)){
		mysql_query ("INSERT INTO contacts (name, email, phone) 
		VALUES ('$name', '$email', '$phone')")
		or die("Could not insert record");
		echo "Contact Added";
	}
?>
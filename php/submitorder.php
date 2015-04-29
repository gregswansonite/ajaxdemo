<?php
	include("coninfo.php");
	$name = $_POST['name'];
	$order = $_POST['order'];
	$recordToDelete = $_POST['recordToDelete'];
	//INSERT RECORD REQUEST - ADD AN ORDER
	if(isset($name)){

		//Make sure the contact exists
		$checkContact = mysql_query("SELECT name FROM `customers`.`contacts` WHERE name='$name'");
		$contact_exist = mysql_num_rows($checkContact);
		if($contact_exist > 0){
			mysql_query ("INSERT INTO orders (name, description) 
			VALUES ('$name', '$order')")
			or die("Could not insert record");
			echo "Order Added";
		}else{
			 echo "Please create a contact before placing an order.";
			 die();
		}
	}
?>
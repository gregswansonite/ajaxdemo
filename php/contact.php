<?php
	include("coninfo.php");
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$recordToDelete = $_POST['recordToDelete'];

	//DELETE RECORD REQUEST - REMOVE A CONTACT
	if(isset($recordToDelete)){
		mysql_query ("DELETE FROM `customers`.`contacts` WHERE `contacts`.`id` = '$recordToDelete'")
		or die("Could not delete record");
		echo "Contact Removed";
	}

	//DEFAULT DATA OUTPUT - DISPLAY ALL CONTACTS
	$query = "SELECT *  FROM `contacts`";  
    $result = mysql_query($query);
    $jsonArray = array();
	while($nt=mysql_fetch_array($result)){
		$row_array['id'] = $nt[id];
		$row_array['name'] = $nt[name];
		$row_array['email'] = $nt[email];
		$row_array['phone'] = $nt[phone];
		array_push($jsonArray,$row_array);	
	}
	echo json_encode($jsonArray);
?>
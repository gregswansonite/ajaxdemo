<?php
	include("coninfo.php");
	$name = $_POST['name'];
	$order = $_POST['order'];
	$recordToDelete = $_POST['recordToDelete'];

	//DELETE RECORD REQUEST - REMOVE AN ORDER
	if(isset($recordToDelete)){
		mysql_query ("DELETE FROM `customers`.`orders` WHERE `orders`.`id` = '$recordToDelete'")
		or die("Could not delete record");
		echo "Order Removed";
	}
	//DEFAULT DATA OUTPUT - DISPLAY ALL ORDERS
	$query = "SELECT *  FROM `orders`";  
    $result = mysql_query($query);
    $jsonArray = array();
	while($nt=mysql_fetch_array($result)){
		$row_array['id'] = $nt[id];
		$row_array['name'] = $nt[name];
		$row_array['description'] = $nt[description];
		array_push($jsonArray,$row_array);			
	}
	echo json_encode($jsonArray);
?>
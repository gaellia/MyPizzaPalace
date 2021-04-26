<?php

	if ($_SESSION['orderCreated'] == 0){
	$_SESSION['orderCreated'] = 1;
		
	$_SESSION['total'] = 0;
		
	$CID = $_SESSION['userID'];
		
	$OID = $_SESSION['OID'];
	$date = date("m.d.y");
	$date = "{$date}";
		
	$time = date("H:i:s"); 
	$time = "{$time}";
		
	$status = "Pending";
		
	$Otype = "Delivery";
				
	//create new order table in database and insert default values for new order
				
	$sqlInsert ="INSERT INTO `order` (OID, Date, Total, Time, Status, CID, Order_Type) VALUES ('". $OID."', '". $date."','". $_SESSION['total']."','". $time."', '". $status."', '". $CID."', '". $Otype."')";

    $db->exec($sqlInsert);

	}
?>

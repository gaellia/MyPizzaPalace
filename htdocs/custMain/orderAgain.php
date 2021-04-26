<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>


<?php

	require 'connect.inc.php';

	session_start();
		
	//From ClearITEMS PAGE the Items to get are in orderAgainOID
	
	include 'setPendingOrder.php';
			
	//Get the previous order OID
	$Old_OID = $_SESSION['orderAgainOID'];

	//get Item IDs	
	$sqlGet = "SELECT * FROM `orderitems` WHERE `OID` = {$Old_OID}";
	$result = $db->query($sqlGet);
	
	echo "Row count = {$result->rowCount()}";

	//for each IID
	if($result->rowCount() > 0){
	
		$_SESSION['itemIndex'] = 0;
		$_SESSION['total'] = 0;

	
		while($order = $result->fetch(PDO::FETCH_ASSOC)){
					
			$item = $order['IID'];

			echo "<br> IID = {$item}"; 
			
			//get menuItem selected
			$sqlGet1 = "SELECT * FROM menuitem WHERE IID = {$item}";
			$result1 = $db->query($sqlGet1);


			echo "{$result1->rowCount()}";
			 

			if($result1->rowCount() == 1){
				$menuItem = $result1->fetch(PDO::FETCH_ASSOC);
				$Price = $menuItem['Price'];
		
				$_SESSION['total'] += $Price;			
		
				$sql2 ="INSERT INTO `orderItems` (OID, ItemIndex, IID) VALUES ('". $_SESSION['OID']."','". $_SESSION['itemIndex']."','". $item."')";

		 		$db->exec($sql2);
	
				$_SESSION['itemIndex'] += 1;
				
			}
	
		}	
	}


	//update datebase with order total 
	$sqlUpdate = "UPDATE `order` SET `Total` = '{$_SESSION['total']}' WHERE `OID`= {$_SESSION['OID']}";
	$stmt = $db->prepare($sqlUpdate);

    // execute the query
    $stmt->execute();


	//header('Location: http://localhost/custMain/shoppingCart.php'); 

?>

</body>

</html>

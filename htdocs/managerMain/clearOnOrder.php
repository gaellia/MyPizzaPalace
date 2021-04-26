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

	
	$sqlGet = "SELECT `Inv_OnOrder`, `Inv_Cost100` FROM `inventory` WHERE `VID` = {$_POST['VID']}";
		
	$result1 = $db->query($sqlGet);

	if($result1->rowCount() == 1){
		$order = $result1->fetch(PDO::FETCH_ASSOC);
		$orderCount = $order['Inv_OnOrder'];
		$cost = $order['Inv_Cost100']/100;

		$invCost = $orderCount * $cost;

		$week = date("W"); 
		$year = date("Y");

		$date = "{$year}-W{$week}";

		$sql1 = "SELECT * FROM `revenue` WHERE `Week` = '{$date}'";
		$result2 = $db->query($sql1);


		if($result2->rowCount() == 0){
		
			$sqlinsert = "INSERT INTO `revenue` (Week, Cost_Emp, Cost_Inv, Sales) VALUES ('". $date."','0','". $invCost."','0')";
			$db->exec($sqlinsert);
		}
		elseif($result2->rowCount() == 1){
			
			$week = $result2->fetch(PDO::FETCH_ASSOC);

			$costInv = $week['Cost_Inv'];

			$newCost = $costInv + $invCost;
								
			$updateRevenue = "UPDATE `revenue` SET `Cost_Inv` = '{$newCost}' WHERE `Week` = '{$date}'";

			// use exec() because no results are returned
			$db->exec($updateRevenue);

		}
				

	}
	
	$sql = "UPDATE `inventory` SET `Inv_count` = '{$_POST['newCount']}', `Inv_OnOrder` = '0', `Ordered_On` = '-' WHERE `VID` = '{$_POST['VID']}'";

    // use exec() because no results are returned
    $db->exec($sql);
	
	header('Location: http://localhost/managerMain/manageInventory.php'); 

?>
</body>

</html>

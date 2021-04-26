<?php

	require 'connect.inc.php';

	session_start();

	
	$name = "{$_SESSION['OID']}";

		
	include 'setPendingOrder.php';
    	
	
	//check what was clicked on in the 
	if(isset($_POST['pizza']))
	{
	 	$item=$_POST['pizza'];
	 	$type = 1;
	}
	if(isset($_POST['wing']))
	{
		$item=$_POST['wing'];
	 	$type = 2;
	}
	if(isset($_POST['pop']))
	{
		$item=$_POST['pop'];
	 	$type = 3;
	}
	if(isset($_POST['salad']))
	{
		$item=$_POST['salad'];
	 	$type = 4;
	}

	//get menuItem selected
	$sqlGet = "SELECT IID, Item_name, Price FROM menuitem WHERE IID = {$item}";
	$result = $db->query($sqlGet);


	if($result->rowCount() == 1){
		$menuItem = $result->fetch(PDO::FETCH_ASSOC);
		$ItemID = $menuItem['IID'];
		$ItemName = $menuItem['Item_name'];
		$Price = $menuItem['Price'];
		
		$_SESSION['total'] += $Price;			
		 		
		$sql2 ="INSERT INTO `orderItems` (OID, ItemIndex, IID) VALUES ('". $_SESSION['OID']."','". $_SESSION['itemIndex']."','". $ItemID."')";

 		$db->exec($sql2);
	
		$_SESSION['itemIndex'] += 1;
	}
	
	//update datebase with order total 
	$sqlUpdate = "UPDATE `order` SET `Total` = '{$_SESSION['total']}' WHERE `OID`= {$_SESSION['OID']}";
	$stmt = $db->prepare($sqlUpdate);

    // execute the query
    $stmt->execute();

	 	 
	if($type == 1)
		header('Location: http://localhost/custMain/pizzaMenu.php');
	if($type == 2)
		header('Location: http://localhost/custMain/wingMenu.php');
	if($type == 3)
		header('Location: http://localhost/custMain/popMenu.php');
	if($type == 4)
		header('Location: http://localhost/custMain/saladMenu.php');


	 	
?>


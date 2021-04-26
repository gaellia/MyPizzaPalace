<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
</head>

<body>

<?php
	require 'connect.inc.php';

	session_start();

	//change order status to active

	$status = "Active";

	$sqlUpdate = "UPDATE `order` SET `Status` = '{$status}' WHERE `OID`= {$_SESSION['OID']}";
	$stmt = $db->prepare($sqlUpdate);

    // execute the query
    $stmt->execute();
    
    // update order type
    $type = $_POST['type'];
    
    if ($type == 'Pickup') { 
        $sql = "UPDATE `order` SET `Order_Type` = 'Pickup' WHERE `OID` = {$_SESSION['OID']}";
        $db->exec($sql);
    }
    
	include 'setOID.php';

	$_SESSION['orderCreated'] = 0;
	$_SESSION['itemIndex'] = 0;
   
	header('Location: http://localhost/custMain/pizzaMenu.php');   
    
?>

</body>

</html>

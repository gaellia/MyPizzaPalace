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
	
	//need to clear current order
	
	$week = date("W"); 
	$year = date("Y");

	$date = "{$year}-W{$week}";


	$sql = "UPDATE `inventory` SET `Inv_OnOrder` = '{$_POST['QTY']}', `Ordered_On` = '{$date}'  WHERE `VID` = '{$_POST['VID']}'";

    // use exec() because no results are returned
    $db->exec($sql);
		
	
	header('Location: http://localhost/managerMain/manageInventory.php'); 

?>
</body>

</html>

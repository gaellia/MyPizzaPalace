<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
</head>

<body>

<?php
	require 'connect.inc.php';

	session_start();

	//change order status to active

	$fname = "{$_POST['fname']}";

	echo $fname;

	//update datebase with order total 

	$sqlUpdate = "UPDATE `employee` SET `First_name` = '{$_POST['fname']}', 
										`Last_name` = '{$_POST['lname']}',
										`Phone` = '{$_POST['phone']}',
										`Street` = '{$_POST['street']}',
										`City` = '{$_POST['city']}',
										`Country` = '{$_POST['country']}',
										`Wage` = '{$_POST['wage']}'
									WHERE `EID`= {$_SESSION['EID']}";
	$stmt = $db->prepare($sqlUpdate);

    // execute the query
    $stmt->execute();
    

	$sqlUpdate = "	UPDATE `user` 
					SET `User_Type` = '{$_POST['type']}'
					WHERE `ID`= {$_SESSION['EID']}";
	$stmt = $db->prepare($sqlUpdate);

    // execute the query
    $stmt->execute();

	header('Location: http://localhost/managerMain/manageEmployee.php');   
    
?>

</body>

</html>
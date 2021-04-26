<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
</head>

<body>

<?php
	require 'connect.inc.php';

	session_start();

	if ($_POST['password'] != $_POST['passwordVerify']){
        header('Refresh: 5; URL=http://localhost/staffMain/staffProfile.php');
        
        echo "Passwords do not match! <br> No changes were saved. Please try again. <br> Redirecting in 5 seconds.";
        
    } else {
    // test

	echo "Changes saved.";

	// update datebase with new details

	$sqlUpdate = "UPDATE `employee` SET `First_name` = '{$_POST['fname']}', 
										`Last_name` = '{$_POST['lname']}',
										`Phone` = '{$_POST['phone']}',
										`Street` = '{$_POST['street']}',
										`City` = '{$_POST['city']}',
										`Country` = '{$_POST['country']}' 
									WHERE `EID`= {$_SESSION['userID']}";
	$stmt = $db->prepare($sqlUpdate);

    // execute the query
    $stmt->execute();
    

	$sqlUpdate = "UPDATE `user` 
					SET `password` = '{$_POST['password']}'
					WHERE `ID`= {$_SESSION['userID']}";
	$stmt = $db->prepare($sqlUpdate);

    // execute the query
    $stmt->execute();

	//header('Location: http://localhost/custMain/custMenu1.php');   
    }
?>

</body>

</html>
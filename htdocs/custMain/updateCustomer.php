<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
</head>

<body>

<?php
	require 'connect.inc.php';

	session_start();

	if ($_POST['password'] != $_POST['passwordVerify']){
        header('Refresh: 5; URL=http://localhost/custMain/custProfile.php');
        
        echo "Passwords do not match! <br> No changes were saved. Please try again. <br> Redirecting in 5 seconds.";
        
    } else {

	// update datebase with new details

	$sqlUpdate = "UPDATE `customer` SET `First_name` = '{$_POST['fname']}', 
										`Last_name` = '{$_POST['lname']}',
										`Phone` = '{$_POST['phone']}',
										`Address` = '{$_POST['address']}' 
							WHERE `CID`= {$_SESSION['userID']}";
	$stmt = $db->prepare($sqlUpdate);

    // execute the query
    $stmt->execute();
    

	$sqlUpdate = "UPDATE `user` 
					SET `password` = '{$_POST['password']}'
					WHERE `ID`= {$_SESSION['userID']}";
	$stmt = $db->prepare($sqlUpdate);

    // execute the query
    $stmt->execute();

    echo "Changes saved.  <br> Redirecting in 3 seconds." ;
	header('Refresh: 3; URL=http://localhost/custMain/index.php');   
    }
?>

</body>

</html>
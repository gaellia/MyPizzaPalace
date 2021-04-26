<?php

session_start();

require 'connect.inc.php';

$login = $_POST['login_name'];
$pass = $_POST['password'];

$query = "SELECT Username, ID, User_Type FROM user WHERE Username = '$login' and Password ='$pass'";

$result = $db->query($query);

$count = 0;
$userType;

while($row = $result->fetch(PDO::FETCH_ASSOC))
{

    $ID = $row['ID'];
	$userType = $row['User_Type'];
	$name = $row['Username'];

	$count++;
}

if ($count == 1)
{
	$_SESSION['userID'] = $ID;
	$_SESSION['userName'] = $name;
    $_SESSION['userType'] = $userType;

	if ($userType == 'Customer')
	{
		
		$_SESSION['orderCreated'] = 0;
		$_SESSION['itemIndex'] = 0;
		include 'setOID.php';

		header('Location: http://localhost/custMain'); 
	}
	else if ($userType == 'Manager')
	{

		header('Location: http://localhost/managerMain'); 
	}
	else if ($userType == 'Cook' || $userType == 'Driver')
	{
	
		header('Location: http://localhost/staffMain');
	}
}
else 
{
    header('Location: http://localhost/Login/loginfailed.html');
}

?>
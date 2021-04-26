<?php

session_start();

require 'connect.inc.php';

$login = $_POST['login_name'];
$pass = $_POST['password'];
$passv = $_POST['passwordVerify'];
$fName = $_POST['firstName'];
$lName = $_POST['lastName'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$query = "SELECT Username FROM user WHERE Username = '$login'";
$result = $db->query($query);

if (($row = $result->fetch(PDO::FETCH_ASSOC)) == NULL && $login != "" && $pass == $passv)
{
	$id = crc32($login);
	if ($id < 0)
		$id *= -1;

	if ($id < 100000000)
		$id *= 9;

	$hash = substr($id, 0, 9);

	$_SESSION['userID'] = $hash;
	$_SESSION['userName'] = $login;
	$_SESSION['orderCreated'] = 0;
	$_SESSION['itemIndex'] = 0;

	include 'setOID.php';

	$sql1 ="INSERT INTO user (Username, ID, Password, User_Type) VALUES ('". $login."', '". $hash."','". $pass."','Customer')";
	$sql2 ="INSERT INTO customer (CID, First_name, Last_name, Phone, Address) VALUES ('". $hash."', '". $fName."','". $lName."','". $phone."', '". $address."')";

	$db->query($sql1);
	$db->query($sql2);

    header('Location: http://localhost/custMain');
}
else 
{
    header('Location: http://localhost/Login/loginfailed.html');
}

?>
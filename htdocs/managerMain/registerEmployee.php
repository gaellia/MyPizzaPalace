<?php

session_start();

require 'connect.inc.php';

$login = $_POST['login_name'];
$pass = $_POST['password'];
$passv = $_POST['passwordVerify'];
$fName = $_POST['firstName'];
$lName = $_POST['lastName'];
$phone = $_POST['phone'];
$address = $_POST['street'];
$city = $_POST['city'];
$country = $_POST['country'];
$wage = $_POST['wage'];
$type = $_POST['type'];

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

	$sql1 ="INSERT INTO user (Username, ID, Password, User_Type) VALUES ('". $login."', '". $hash."','". $pass."','". $type."')";
	$sql2 ="INSERT INTO employee (EID, First_name, Last_name, Phone, Street, City, Country, Wage) VALUES ('". $hash."', '". $fName."','". $lName."','". $phone."', '". $address."', '". $city."', '". $country."', '". $wage."')";

	$db->query($sql1);
	$db->query($sql2);

   header('Location: http://localhost/managerMain/manageEmployee.php');
}
else 
{
    header('Location: http://localhost/Login/loginfailed.html');
}

?>
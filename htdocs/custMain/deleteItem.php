<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
</head>

<body>



<?php


	require 'connect.inc.php';

	session_start();


	$value = $_POST['button'];

	// sql to delete a record
    $sql = "DELETE FROM orderitems WHERE `OID` = {$_SESSION['OID']} AND `ItemIndex` = {$value}";

    // use exec() because no results are returned
    $db->exec($sql);
    
    header('Location: http://localhost/custMain/shoppingCart.php');


?>


</body>

</html>

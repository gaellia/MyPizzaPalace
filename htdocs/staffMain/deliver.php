<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
</head>

<body>



<?php


	require 'connect.inc.php';

	session_start();


	$OID = $_POST['button'];
    
    $sql = "UPDATE `order` SET `Status` = 'Delivered' WHERE `OID` = {$OID}";

    // use exec() because no results are returned
    $db->exec($sql);
    
    header('Location: http://localhost/staffMain/staffOrders.php');


?>


</body>

</html>

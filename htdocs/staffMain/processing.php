<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
</head>

<body>

<table class="auto-style3" cellpadding="20" cellspacing="5" style="width: 30%" align="center" bgcolor="#A7A7A7">

<?php


	require 'connect.inc.php';

	session_start();

	$OID = $_POST['button'];

	$OID = "{$OID}";

	echo "<tr><td colspan='4'>Order # : {$OID}</td>";
	 
	$sqlGet = "SELECT *  FROM `orderitems` WHERE `OID` = {$OID}";
	$result = $db->query($sqlGet);

	$total = 0;

	echo "<tr><td>Item</td>  <td>Name</td>  <td>Price</td></tr>";			

	if($result->rowCount() > 0)
	{
		while($row = $result->fetch(PDO::FETCH_ASSOC))
		{
			if ($row['IID'] != NULL)
			{
				$itemIndex = $row['ItemIndex'];
				$IID = $row['IID'];
				
				$row2 = $db->query("SELECT * FROM `menuitem` WHERE `IID` = {$IID}")->fetch(PDO::FETCH_ASSOC);

				$Itemname = $row2['Item_name'];
				$Price = $row2['Price'];
				$total += $Price;
		
				echo "<tr><td>{$IID}</td> <td>{$Itemname}</td>  <td>{$Price}</td> </tr>";
			}
		}
		
	}
    
    echo "<tr><td colspan='2'>Total Cost = {$total}</td> <td><form action='processing2.php' method='POST'><input type='hidden' name='button' value=\"$OID\"/><button>Process</button></form></td> <td><button onclick='history.go(-1);'>Go Back</button></td></tr>";

?>


</table>


</body>

</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Shopping Cart</title>
<link href="layout.css" rel="stylesheet" type="text/css">

</head>

<body>


<table cellpadding="10" cellspacing="0" style="width: 100%" bgcolor="#313131" align="center">

<?php

	require 'connect.inc.php';
	
	session_start();

	$OID = $_SESSION['OID'];

	$OID = "{$OID}";
	
	$sqlGet = "SELECT *  FROM `orderitems` WHERE `OID` = {$OID}";
	$result = $db->query($sqlGet);

	$total = 0;

	echo "
	<tr height='60'>
		<td class='underlined' bgcolor='#373737' align='center' style='font-size: 20px;'>Item</td> 
		<td class='underlined' bgcolor='#373737' align='center' style='font-size: 20px;'>Name</td> 
		<td class='underlined' bgcolor='#373737' align='center' style='font-size: 20px;'>Price</td>
		<td class='underlined' bgcolor='#373737' align='center' width='170'></td>
	</tr>";			

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
				
				$buttonTHING = "
				<form action='deleteItem.php' method='POST' style='width: 200px'>
					<input type='hidden' name='button' value=\"$itemIndex\"/>
					<button>Remove item</button>
				</form>";
		
				echo "
				<tr>
					<td class='underlined' align='center'>{$IID}</td> 
					<td class='underlined' align='center'>{$Itemname}</td>  
					<td class='underlined' align='center'>{$Price}</td> 
					<td align='center'>{$buttonTHING}</td>
				</tr>";
			}
		}
		
	}
    
        // sql to update total
    $sql = "UPDATE `order` SET `total` = '$total' WHERE `OID` = '$OID'";

    // use exec() because no results are returned
    $db->exec($sql);
	
	echo "
	<tr height='60'/>
	<tr>
		<td colspan='3' class='underlined' align='center' rowspan='2'>Total Cost = {$total}</td> 
		<td align='center'>
			<form action ='orderConfirmation.php' method='post'>
				<input type='hidden' name='type' value='Pickup'/>
				<button>Pickup</button>
			</form>
		</td>
	</tr>
	<tr>
		<td align='center'>
			<form action ='orderConfirmation.php' method='post'>
				<input type='hidden' name='type' value='Delivery'/>
				<button>Delivery</button>
			</form>
		</td>
	</tr>";	
	 	 
?>


</table>


</body>

</html>

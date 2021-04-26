<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="layout.css" rel="stylesheet" type="text/css">	
</head>

<body>

<table cellpadding="10" cellspacing="0" style="width: 100%" bgcolor="#313131" align="center">

<?php

	require 'connect.inc.php';

	session_start();
	
	$CID = $_SESSION['userID'];
	
	
	$sqlGet = "SELECT * FROM `order` WHERE `CID` = {$CID}";
	$result = $db->query($sqlGet);

	echo "
	<tr height='60'>
		<td  class='underlined' bgcolor='#373737' align='center' style='font-size: 20px;'>OID</td> 
		<td  class='underlined' bgcolor='#373737' align='center' style='font-size: 20px;'>Date</td> 
		<td  class='underlined' bgcolor='#373737' align='center' style='font-size: 20px;'>Total</td> 
		<td  class='underlined' bgcolor='#373737' align='center' style='font-size: 20px;'>Time</td> 
		<td  class='underlined' bgcolor='#373737' align='center' style='font-size: 20px;'>Status</td> 
		<td  class='underlined' bgcolor='#373737' align='center' style='font-size: 20px;'>Type</td>
		<td  class='underlined' bgcolor='#373737' align='center' style='font-size: 20px;'></td>
	</tr>";				

	//get Item information for receipt
	if($result->rowCount() > 0){
		while($order = $result->fetch(PDO::FETCH_ASSOC)){
			
			$OID = $order['OID'];
			$date = $order['Date'];		
			$total = $order['Total'];
			$time = $order['Time'];
			$status = $order['Status'];
			$type = $order['Order_Type'];
									
			$buttonTHING = "
			<form action='clearPendingOrder.php' method='POST' style='width: 200px'>
				<input type='hidden' name='button' value=\"$OID\"/>
				<button>Order Again</button>
			</form>";
				
			echo "
			<tr>
				<td class='underlined' align='center'>{$OID}</td> 
				<td class='underlined' align='center'>{$date}</td> 
				<td class='underlined' align='center'>{$total}</td> 
				<td class='underlined' align='center'>{$time}</td> 
				<td class='underlined' align='center'>{$status}</td> 
				<td class='underlined' align='center'>{$type}</td> 
				<td width='10%' align='center'>{$buttonTHING}</td>
			</tr>";
				
		}
	}
			 	 
?>

</table>

</body>

</html>

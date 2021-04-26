<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
</head>

<body>

<h1>&nbsp;</h1>
<h1>&nbsp;Current Inventory</h1>

<table cellpadding="20" cellspacing="5" style="width: 50%" bgcolor="#9A9A9A">

<?php

	require 'connect.inc.php';

	session_start();
	
	
	$sqlGet = "SELECT * FROM `inventory`";
	$result = $db->query($sqlGet);
			
	echo "
	<tr>
		<td>VID</td> 
		<td>&nbsp</td> 
		<td>Name</td> 
		<td>&nbsp</td> 
		<td>Count</td> 
		<td>&nbsp</td> 
		<td>On Order</td> 
		<td>&nbsp</td> 
		<td>Cost/100</td> 
		<td>&nbsp</td> 
		<td>Ordered On</td>
		<td>&nbsp</td> 
		<td>&nbsp</td>
		<td>Quantitty</td> 
		<td>&nbsp</td>
		<td>&nbsp</td>
		<td>&nbsp</td> 
	</tr>";				

	//get inventory
	if($result->rowCount() > 0){
		while($item = $result->fetch(PDO::FETCH_ASSOC)){
			
			$VID = $item['VID'];
			$name = $item['Inv_name'];		
			$count = $item['Inv_Count'];
			$onOrder = $item['Inv_OnOrder'];
			$cost100 = $item['Inv_Cost100'];
			$orderedOn = $item['Ordered_On'];
			
			$newCount = $count + $onOrder;

			echo "
			<tr>
				<td>{$VID}</td> 
				<td>&nbsp</td> 
				<td>{$name}</td> 
				<td>&nbsp</td> 
				<td>{$count}</td> 
				<td>&nbsp</td> 
				<td>{$onOrder}</td> 
				<td>&nbsp</td> 
				<td>{$cost100}</td>
				<td>&nbsp</td> 
				<td>{$orderedOn}</td>
				<td>&nbsp</td> 
				<td>
				<form action='clearOnOrder.php' method='POST'>
					<input type='hidden' name='VID' value='{$VID}'/>
					<input type='hidden' name='newCount' value='{$newCount}'/>
					<input type='submit' value='Order Delivered'/>
				</form>
				</td>
				<td>
				<form action='orderInventory.php' method='POST'>
				<input type='text' name='QTY' value=''/>
				</td>
				<td>
				<input type='hidden' name='VID' value='{$VID}'/>
				<input type='submit' value='Order'/>
				</form>
				</td>
			</tr>";
				
		}
	}
	
	
?>

</table>


</body>

</html>

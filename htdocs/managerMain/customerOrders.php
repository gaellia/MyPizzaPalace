<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<body>

<table class="auto-style3" cellpadding="20" cellspacing="5" style="width: 50%" >

<?php

	require 'connect.inc.php';

	session_start();
	
	$sqlGet = "SELECT * FROM `order`";
	$result = $db->query($sqlGet);


	echo "<tr><td colspan='5'>All Orders Ever: </td></tr>";
			
	echo "<tr><td>OID</td> <td>&nbsp</td> <td>Date</td> <td>&nbsp</td> <td>Total</td> <td>&nbsp</td> <td>Time</td> <td>&nbsp</td> <td>Status</td> <td>&nbsp</td> <td>CID</td> <td>&nbsp</td> <td>Type</td></tr>";				

	//get Item information for receipt
	if($result->rowCount() > 0){
		while($order = $result->fetch(PDO::FETCH_ASSOC)){
			
			$OID = $order['OID'];
			$date = $order['Date'];		
			$total = $order['Total'];
			$time = $order['Time'];
			$status = $order['Status'];
            $CID = $order['CID'];
			$type = $order['Order_Type'];
									
            if($status != 'Delivered') {
                $buttonTHING = "<form action='editOrder.php' method='POST' style='width: 200px'><input type='hidden' name='button' value=\"$OID\"/><button>Edit</button></form>";
            }
            else {
                $buttonTHING = "<form action='viewOrder.php' method='POST' style='width: 200px'><input type='hidden' name='button' value=\"$OID\"/><button>View</button></form>";
            }
                		
			echo "<tr><td>{$OID}</td> <td>&nbsp</td> <td>{$date}</td> <td>&nbsp</td> <td>{$total}</td> <td>&nbsp</td> <td>{$time}</td> <td>&nbsp</td> <td>{$status}</td> <td>&nbsp</td> <td>{$CID}</td> <td>&nbsp</td> <td>{$type}</td> <td>&nbsp</td> <td>{$buttonTHING}</td></tr>";
				
		}
	}
			 	 
?>

</table>

</body>

</html>

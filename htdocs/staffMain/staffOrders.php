<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Check Orders</title>
</head>

<body>


<table class="auto-style3" cellpadding="20" cellspacing="5" style="width: 30%" align="center" bgcolor="#A7A7A7">

<?php

	require 'connect.inc.php';
	
	session_start();

	$userType = $_SESSION['userType'];
    
    echo "<tr><td colspan='4'>User Type : {$userType}</td>";
	 
     
    if($userType == 'Cook') {
        $sqlGet = "SELECT *  FROM `order` WHERE `Status` = 'Active'";
    }
    elseif($userType == 'Driver') {
        $sqlGet = "SELECT *  FROM `order` WHERE `Status` = 'Ready' AND `Order_Type` = 'Delivery'";
    }
    
	$result = $db->query($sqlGet);

	echo "<tr><td>Order ID</td>  <td>Date</td>  <td>Time</td>   <td>Status</td>   <td>CID</td>   <td>Order Type</td>    <td>Address</td></tr>";			

	if($result->rowCount() > 0)
	{
		while($row = $result->fetch(PDO::FETCH_ASSOC))
		{
			if ($row['OID'] != NULL)
			{
				$OID = $row['OID'];
				$date = $row['Date'];
                $time = $row['Time'];
                $status = $row['Status'];
                $CID = $row['CID'];
                $type = $row['Order_Type'];    
                
                // get customer address
                $sql2 = "SELECT `Address` FROM `customer` WHERE `CID` = '$CID'";
                $result2 = $db->query($sql2);
                $row2 = $result2->fetch(PDO::FETCH_ASSOC);
                $address = $row2['Address'];
                           
                if($userType == 'Cook') {
                        
                    $buttonTHING = "<form action='processing.php' method='POST' style='width: 200px'><input type='hidden' name='button' value=\"$OID\"/><button>Process?</button></form>";
                }
                elseif($userType == 'Driver') {
                        
                    $buttonTHING = "<form action='deliver.php' method='POST' style='width: 200px'><input type='hidden' name='button' value=\"$OID\"/><button>Delivered</button></form>";
                }
                
		
				echo "<tr><td>{$OID}</td> <td>{$date}</td>  <td>{$time}</td> <td>{$status}</td> <td>{$CID}</td> <td>{$type}</td> <td>{$address}</td> <td>{$buttonTHING}</td></tr>";
			}
		}
		
	}
	 	 
?>


</table>


</body>

</html>

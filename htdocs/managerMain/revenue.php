<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<style type="text/css">
table
{
	background-color: #B5B5B5;
}
.auto-style1 {
	text-align: left;
	font-family: Broadway;
	vertical-align: middle;
}
.auto-style3 {
	border: 2px solid #000000;
	margin-left: 425px;
}
.auto-style4 {
	border: 2px solid #000000;
	text-align: center;
}
.auto-style5 {
	text-align: left;
	font-family: Broadway;
	vertical-align: middle;
	margin-left: 575px;
}
</style>
</head>

<body>



<h1 class="auto-style1" style="width: 217px">&nbsp;</h1>
<h1>Revenue</h1>

<table cellpadding="20" cellspacing="5">

<?php

	require 'connect.inc.php';
	
	session_start();

	$sqlGet = "SELECT *  FROM `revenue`";
	$result = $db->query($sqlGet);

	echo "<tr><td>Week</td>  <td>Employee Cost</td>  <td>Inventory Cost</td> <td>Sales</td> <td>Total</td></tr>";			

	if($result->rowCount() > 0)
	{
		while($revenue = $result->fetch(PDO::FETCH_ASSOC)) 
		{
			if ($revenue['Week'] != NULL)
			{
				$week = $revenue['Week'];
				$empCost = $revenue['Cost_Emp'];
				$invCost = $revenue['Cost_Inv'];
				$sales = $revenue['Sales'];
				$total = $sales - $empCost -$invCost;
					
				echo "<tr><td>{$week}</td> <td>{$empCost}</td>  <td>{$invCost}</td> <td>{$sales}</td> <td>{$total}</td></tr>";
			}
		}
		
	}
	
	 	 
?>


</table>




</body>

</html>

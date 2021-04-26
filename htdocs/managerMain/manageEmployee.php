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
<h1>Manage Employee</h1>

<table cellpadding="20" cellspacing="5">

<?php

	require 'connect.inc.php';
	
	session_start();

		 
	$sqlGet = "SELECT *  FROM `employee` WHERE `EID` NOT IN (SELECT ID from `user` WHERE `User_Type` = 'Manager')";
	$result = $db->query($sqlGet);

	echo "<tr><td>EID</td>  <td>Name</td>  <td>Street</td> <td>City</td> <td>Country</td> <td>Wage</td> </tr>";			

	if($result->rowCount() > 0)
	{
		while($employee = $result->fetch(PDO::FETCH_ASSOC)) 
		{
			if ($employee['EID'] != NULL)
			{
				$EID = $employee['EID'];
				$fname = $employee['First_name'];
				$lname = $employee['Last_name'];
				$street = $employee['Street'];
				$city = $employee['City'];
				$country = $employee['Country'];
				$wage = $employee['Wage'];
				
				$buttonTHING = "<form action='editEmployee.php' method='POST' style='width: 200px'><input type='hidden' name='button' value=\"$EID\"/><button>Edit</button></form>";
		
				echo "<tr><td>{$EID}</td> <td>'{$fname} {$lname}'</td>  <td>{$street}</td> <td>{$city}</td> <td>{$country}</td> <td>{$wage}</td>   <td>{$buttonTHING}</td></tr>";
			}
		}
		
	}
	
	echo "<tr><td colspan='2'>New Employee</td> <td><form action ='addEmployee.php'><input type='submit' name='addButton' value='Add'/></form></td></tr>";	
	 	 
?>


</table>




</body>

</html>

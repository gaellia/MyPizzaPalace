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
	border: 2px solid #000000;
}
</style>
</head>
<body>

<?php
	require 'connect.inc.php';

	session_start();
	
	$_SESSION['week'] = $_POST['week'];

	$dayOfWeek = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
	$shift = array("Day", "Night");
	$position = array("Manager", "Cook", "Driver");


	echo "<table class='auto-style1' style='width: 100' align='center'>
		  <td class='auto-style1' style='width: 72px; height: 32px;'>Weekday</td>";

	foreach ($dayOfWeek as $day){
	
		echo "<td class='auto-style1' style='width: 175px; height: 32px;' colspan='2'>{$day}</td>";

	}
	echo "</tr>";

	foreach ($shift as $s){
	
		if ($s == "Day")
			echo"<tr><td class='auto-style1' style='width: 72px' rowspan='3'>Days<br/>(8:30am - 4:30pm)</td>";
		else
			echo"<tr><td class='auto-style1' style='width: 72px' rowspan='3'>Nights<br/>(4:30am - 12:30pm)</td>";
			
		foreach ($position as $p)
		{
			foreach ($dayOfWeek as $day)
			{
				echo "
					<td class='auto-style1' style='width: 175px; height: 4px;'>{$p}</td>
					<td class='auto-style1' style='width: 175px; height: 4px;'>";
																				
																																	
				$sqlGet = "SELECT EID FROM `shift` WHERE `Day` = '{$day}' AND `Shift_Type` = '{$s}' AND `Position` = '{$p}' AND `Week`= '{$_SESSION['week']}'";
				$result = $db->query($sqlGet);
	
				if($result->rowCount() == 1){
					
					$employee = $result->fetch(PDO::FETCH_ASSOC);
						
					$sqlGet1 = "SELECT First_name, Last_name FROM `employee` WHERE `EID` = '{$employee['EID']}'";
					$result1 = $db->query($sqlGet1);

					if($result1->rowCount() == 1){
					
						$employee1 = $result1->fetch(PDO::FETCH_ASSOC);

						echo "{$employee1['First_name']} {$employee1['Last_name']}";

						
					}
				}											
																						
				echo "</td>";
																				
			}

		echo "</tr><tr>";
		}
	
		echo "</tr>";
	}
	
?>																		
														

</table>



</body>
</html>
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
<form action="saveSchedule.php" method="POST">
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
																				
																																	
				$sqlGet = "SELECT First_name, Last_name, EID FROM `employee` WHERE `EID` NOT IN (SELECT ID from `user` WHERE `User_Type` <> '{$p}')";
				$result = $db->query($sqlGet);
	
				if($result->rowCount() > 0){
					$name = "{$day}{$p}{$s}";
					$select= "<select name='{$name}'>";
					while($employee = $result->fetch(PDO::FETCH_ASSOC)){
						$select.='<option value="'.$employee['EID'].'">'.$employee['First_name'].'&nbsp'.$employee['Last_name'].'</option>';
					}
				}
																	
				$select.='</select>';
															
				echo $select;
																			
				echo "</td>";
																				
			}

		echo "</tr><tr>";
		}
	
		echo "</tr>";
	}
	
?>																		
														
	
	<tr>
	
		<td colspan="4"><input type="submit" name="submitButton" value="Save"></td>
		</form>
	</tr>
</form>
</table>



</body>
</html>
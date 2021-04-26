<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>


<body>
	
<?php
	
	
	require 'connect.inc.php';

	session_start();

	$dayOfWeek = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
	$shift = array("Day", "Night");
	$position = array("Manager", "Cook", "Driver");
	
	$date = "{$_SESSION['week']}";
		
	$query = "SELECT * FROM shift WHERE Week = '$date'";
	$result = $db->query($query);

	if (($row = $result->fetch(PDO::FETCH_ASSOC)) == NULL)
	{
		
		$weekCost = 0;

		foreach ($shift as $s){
			
			foreach ($position as $p){
			
				foreach ($dayOfWeek as $day){
				
					$EID = $_POST["{$day}{$p}{$s}"];
					
					$sql1 ="INSERT INTO shift (Week, EID, Day, Shift_Type, Position) VALUES ('". $date."', '". $EID."', '". $day."', '". $s."','". $p."')";
		
					$db->query($sql1);

					//get employee Cost_Emp
					$sqlemployeeWage = "SELECT `Wage` FROM `employee` WHERE `EID` = '{$EID}'";

					$employeeWageResult = $db->query($sqlemployeeWage);

					if($employeeWageResult->rowCount() == 1){
						$employeeWage = $employeeWageResult->fetch(PDO::FETCH_ASSOC);

						$wage = $employeeWage['Wage'];
						$cost = $wage * 8;
						
						$weekCost += $cost;

					}

				}
			}

		}
		    	
	}

	else{
	
		$weekCost = 0;

		foreach ($shift as $s){
			
			foreach ($position as $p){
			
				foreach ($dayOfWeek as $day){
				
					$EID = $_POST["{$day}{$p}{$s}"];
					
					
					$sqlUpdate = "UPDATE `shift` SET `EID` = '{$EID}' WHERE `Week` = '{$date}' AND `Day` = '{$day}' AND `Position` = '{$p}' AND `Shift_Type` = '{$s}'";
					$stmt = $db->prepare($sqlUpdate);

					// execute the query
					$stmt->execute();

					//get employee Cost_Emp
					$sqlemployeeWage = "SELECT `Wage` FROM `employee` WHERE `EID` = '{$EID}'";

					$employeeWageResult = $db->query($sqlemployeeWage);

					if($employeeWageResult->rowCount() == 1){
						$employeeWage = $employeeWageResult->fetch(PDO::FETCH_ASSOC);

						$wage = $employeeWage['Wage'];
						$cost = $wage * 8;
						
						$weekCost += $cost;

					}
   
				}
			}

		}

	}

	
	
	$week = date("W"); 
	$year = date("Y");

	$date = "{$year}-W{$week}";

	$sql1 = "SELECT * FROM `revenue` WHERE `Week` = '{$date}'";
	$result2 = $db->query($sql1);


	if($result2->rowCount() == 0){
		
		$sqlinsert = "INSERT INTO `revenue` (Week, Cost_Emp, Cost_Inv, Sales) VALUES ('". $date."','". $weekCost."','0','0')";
		$db->exec($sqlinsert);
	}
	elseif($result2->rowCount() == 1){
			
		$week = $result2->fetch(PDO::FETCH_ASSOC);

		
		$updateRevenue = "UPDATE `revenue` SET `Cost_Emp` = '{$weekCost}' WHERE `Week` = '{$date}'";

		// use exec() because no results are returned
		$db->exec($updateRevenue);

	}
				

	


	
	header('Location: http://localhost/managerMain/manageSchedule.php');
?>


	
</body>
</html>
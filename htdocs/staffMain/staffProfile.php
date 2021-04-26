<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>


<?php

	require 'connect.inc.php';

	session_start();
	
	//get user ID	
	$sqlGet = "SELECT * FROM `user` WHERE `ID` = {$_SESSION['userID']}";
    $sqlGet2 = "SELECT * FROM `employee` WHERE `EID` = {$_SESSION['userID']}";
	$result = $db->query($sqlGet);
    $result2 = $db->query($sqlGet2);
	
	
	//for each user ID
	if($result->rowCount() == 1 && $result2->rowCount() == 1){
		
		$user = $result->fetch(PDO::FETCH_ASSOC);
        $employee = $result2->fetch(PDO::FETCH_ASSOC);
	
		$_SESSION['password'] = $user['Password'];
		$_SESSION['fname'] = $employee['First_name'];
		$_SESSION['lname'] = $employee['Last_name'];
		$_SESSION['phone'] = $employee['Phone'];
		$_SESSION['street'] = $employee['Street'];
		$_SESSION['city'] = $employee['City'];
		$_SESSION['country'] = $employee['Country'];
        
        $_SESSION['username'] = $user['Username'];
		?>

		<html>

		<body>

		<table cellpadding="2">
			<tr>
				<td colspan='5'>User : <?php echo "{$_SESSION['userID']}&nbsp&nbsp{$_SESSION['username']}";?></td>
			</tr>
			<br><br>
			<tr>
				<td>
					<form action='updateStaff.php' method='POST'>
                    
					Password : <input type='password' name='password' value='<?php echo "{$_SESSION['password']}";?>' disabled>
					<input type="button" name='edit1' value='edit'>
					<input type="button" name='save1' value='save'>	
			
					<br><br>
                                        
					Verify Password : <input type='password' name='passwordVerify' value='<?php echo "{$_SESSION['password']}";?>' disabled>
					<input type="button" name='edit1a' value='edit'>
					<input type="button" name='save1a' value='save'>	
			
					<br><br>
                    <br><br>
				
					First Name : <input type='text' name='fname' id='category' value='<?php echo "{$_SESSION['fname']}";?>' disabled>
					<input type="button" name='edit2' value='edit'>
					<input type="button" name='save2' value='save'>	
			
					<br><br>
					
					Last Name : <input type='text' name='lname' id='category' value='<?php echo "{$_SESSION['lname']}";?>' disabled>
					<input type="button" name='edit3' value='edit'>
					<input type="button" name='save3' value='save'>
			
					<br><br>
							
					Phone : <input type='text' name='phone' id='category' value='<?php echo "{$_SESSION['phone']}";?>' disabled>
					<input type="button" name='edit4' value='edit'>
					<input type="button" name='save4' value='save'>
					
					<br><br>
					
					Street : <input type='text' name='street' value='<?php echo "{$_SESSION['street']}";?>' disabled>
					<input type="button" name='edit5' value='edit'>
					<input type="button" name='save5' value='save'>
		
					<br><br>
					
					City : <input type='text' name='city' value='<?php echo "{$_SESSION['city']}";?>' disabled>
					<input type="button" name='edit6' value='edit'>
					<input type="button" name='save6' value='save'>
				
					<br><br>
							
					Country : <input type='text' name='country'  value='<?php echo "{$_SESSION['country']}";?>' disabled>
					<input type="button" name='edit7' value='edit'>
					<input type="button" name='save7' value='save'>
				
					<br><br>
					
					<input type="submit" name="submitButton" value="Update">
						
					</form>
				</td>
			</tr>
		</table>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
                $("input[name=edit1]").on("click",function(){
					 $("input[name=password]").removeAttr("disabled");
				})
				$("input[name=save1]").on("click",function(){
					$("input[name=password]").prop("disabled",true);
				})
                $("input[name=edit1a]").on("click",function(){
					 $("input[name=passwordVerify]").removeAttr("disabled");
				})
				$("input[name=save1a]").on("click",function(){
					$("input[name=passwordVerify]").prop("disabled",true);
				})
				$("input[name=edit2]").on("click",function(){
					 $("input[name=fname]").removeAttr("disabled");
				})
				$("input[name=save2]").on("click",function(){
					$("input[name=fname]").prop("disabled",true);
				})
				$("input[name=edit3]").on("click",function(){
					 $("input[name=lname]").removeAttr("disabled");
				})
				$("input[name=save3]").on("click",function(){
					$("input[name=lname]").prop("disabled",true);
				})
				$("input[name=edit4]").on("click",function(){
					$("input[name=phone]").removeAttr("disabled");
				})
				$("input[name=save4]").on("click",function(){
					$("input[name=phone]").prop("disabled",true);
				})
				$("input[name=edit5]").on("click",function(){
					$("input[name=street]").removeAttr("disabled");
				})
				$("input[name=save5]").on("click",function(){
					$("input[name=street]").prop("disabled",true);
				})
				$("input[name=edit6]").on("click",function(){
					$("input[name=city]").removeAttr("disabled");
				})
				$("input[name=save6]").on("click",function(){
					$("input[name=city").prop("disabled",true);
				})
				$("input[name=edit7]").on("click",function(){
					 $("input[name=country]").removeAttr("disabled");
				})
				$("input[name=save7]").on("click",function(){
					$("input[name=country").prop("disabled",true);
				})
				$("input[name=submitButton]").on("click", function(){
                    $("input[name=password]").removeAttr("disabled");
                    $("input[name=passwordVerify]").removeAttr("disabled");
					$("input[name=fname]").removeAttr("disabled");
					$("input[name=lname]").removeAttr("disabled");
					$("input[name=phone]").removeAttr("disabled");
					$("input[name=street]").removeAttr("disabled");
					$("input[name=city]").removeAttr("disabled");
					$("input[name=country]").removeAttr("disabled");
                })
			})
		</script>
		</body>
		</html>

		<?php

	}


?>

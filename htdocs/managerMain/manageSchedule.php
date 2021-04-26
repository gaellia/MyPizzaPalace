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
	
	<table class="auto-style1" style="width: 100" align="center">
		<tr>
			<td colspan="5"><h1>Employee Schedule</h1></td>
		<tr>
		<form action='createSchedule.php' method='POST'>
		<tr><td><input type="week" name="week"/><input type="submit" name="Create Schedule" value="Create Schedule"/></td></tr>
		</form>
		<form action='getSchedule.php' method='POST'>
		<tr><td><input type="week" name="week"/><input type="submit" name="Get Schedule" value="Get Schedule"/></td></tr>
		</form>
	</table>
	

</body>

</html>

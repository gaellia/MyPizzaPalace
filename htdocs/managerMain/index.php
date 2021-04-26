<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>index.html</title>
<style type="text/css">
a
{
	text-decoration: none;
}

.title
{
	color: #CBCBCB;
	box-sizing: inherit;
	font-size: 40px;
	font-weight: 100;
	text-decoration: none;
	vertical-align: middle;
	letter-spacing: 20px;
	font-family: Helvetica, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif;
	display: table-cell;
	line-height: 40px;
	text-align: left;
	padding-left: 10px;
}
.sidebar
{
	color: #CBCBCB;
	font-size: 15px;
	word-wrap: break-word;
	font-weight: 100;
	text-decoration: none;
	vertical-align: middle;
	letter-spacing: 3px;
	font-family: Helvetica, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif;
	display: table-cell;
	line-height: 20px;
	text-align: center;
	width: 100px;
	max-width: 100px;
	height: 100px;
}
.text
{
	color: #FFFFFF;
	letter-spacing: 3px;
	word-spacing: 5px;
	font-family: Helvetica, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif;
	text-align: right;
	padding-right: 10px;
	font-size: 15px;
	font-weight: 100;
	line-height: 20px;
}
@media (min-width: 1500px){}
	
</style>

</head>
<body>
	<table align="center" width="100%" border="0" cellpadding="0" cellspacing="0" style="table-layout: fixed">
		<tr height="100">
			<td bgcolor="#393939" align="center" width="100">
				<a href="index.php"><img src="../images/pizzaicon.png" width="90" height="85" alt="" /></a>
			</td>
			<td width="5" bgcolor="#00FFCD"/>
			<td width="300" bgcolor="#636363" align="center">
				<p class="title">PIZZA PALACE</p>
			</td>
			<td bgcolor="#8D8D8D" width="100" align="center">
				
			</td>
			<td bgcolor="#8D8D8D" width="5"/>

			
			<td bgcolor="#8D8D8D">
				<span>
					<?php
						session_start();

						$ID = $_SESSION['userID'];
						$name = $_SESSION['userName'];
						echo "<p class='text'>Welcome back {$name}<br>";
						echo "{$ID}</p>";
					?>
				</span>
			</td>
			
			<td bgcolor=" #FFF356" width="5" />
			<td bgcolor="#8D8D8D" width="100">
				<a href="logout.php" target="_top">
					<p class="sidebar">
						Logout
					</p>
				</a>
			</td>


		</tr>
		
		<tr height="3">
			<td bgcolor="#FFFFFF" colspan="8"/>
		</tr>
		
		<tr>
			<td colspan="2">
				<table width="105" cellpadding="0" cellspacing="0" cols="2">
					<tr height="100">
						<td bgcolor="#8D8D8D">
							<a href="manageEmployee.php" target="main">
								<p class="sidebar">
									Manage Employee
								</p>
							</a>
						</td>
						<td bgcolor="#C0FF00" width="5" />
					</tr>
					<tr height="100">
						<td bgcolor="#8D8D8D">
							<a href="manageSchedule.php" target="main">
								<p class="sidebar">
									Shift Schedule
								</p>
							</a>
						</td>
						<td bgcolor="#FFA700" width="5"  />
					</tr>
					<tr height="100">
						<td bgcolor="#8D8D8D">
							<a href="manageInventory.php" target="main">
								<p class="sidebar">
									Inventory
								</p>
							</a>
						</td>
						<td bgcolor="#FF3F42" width="5"  />
					</tr>
					<tr height="100">
						<td bgcolor="#8D8D8D">
							<a href="customerOrders.php" target="main">
								<p class="sidebar">
									Customer Orders
								</p>
							</a>
						</td>
						<td bgcolor="#FF3F42" width="5"  />
					</tr>
					<tr height="100">
						<td bgcolor="#8D8D8D">
							<a href="managerProfile.php" target="main">
								<p class="sidebar">
									Profile
								</p>
							</a>
						</td>
						<td bgcolor="#FF3F42" width="5"  />
					</tr>
					<tr height="400">
						<td bgcolor="#7C7C7C">

						</td>
					</tr>
				</table>
			</td>
			<td align="center" colspan="6" height="790" background="">
				<iframe name="main" src="manageEmployee.php" width="100%" height="100%" frameborder="0" />
			</td>
			
		</tr>
	</table>
</body>

</html>

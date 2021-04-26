<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>index.html</title>
<link href="layout.css" rel="stylesheet" type="text/css">
</head>
	
<body bgcolor="#4D4D4D">
	
	<ul class="topmenu">
		<li>
			<a href="pizzaMenu.php" target="content">
				<img src="../images/pizzaicon.png" width="105" height="100" alt=""/>
			</a>
			<span>
				PIZZA<br/>PALACE
			</span>
		</li>
		<li style="float: right; vertical-align: middle;">
			<a href="shoppingCart.php" target="content">
				<img src="../images/carticon.png" width="100" height="100" alt=""/>
			</a>
		</li>
		<ul style="float: right; list-style-type: none;">
			<li>
				<a href="logout.php">
					<img src="../images/logouticon.png" width="50" height="50" alt=""/>
				</a>
			</li>
			<br/>
			<li>
				<a href="custProfile.php">
					<img src="../images/usericon.png" width="50" height="50" alt=""/>
				</a>
			</li>
		</ul>
		<li style="float: right;">
			<span style="font-size: 12px; line-height: 18px; text-align: right; vertical-align: middle; padding: 0px; margin: 0px;">
				<?php
					session_start();

					$ID = $_SESSION['userID'];
					$name = $_SESSION['userName'];
					echo "<p>Welcome back {$name}<br>{$ID}</p>";
				?>
			</span>
		</li>
	</ul>
	
	<div class="bar" style="background-color:#DCDCDC"/>
	
	<div class="column sidebar">

		<ul>

			<li>
				<a href="pizzaMenu.php" target="content" class="red">
					<p style="font-size: 40px; letter-spacing: 10px; line-height: 100px;">
						Pizza
					</p>
				</a>
			</li>
			<li>
				<a href="wingMenu.php" target="content" class="orange">
					<p style="font-size: 40px; letter-spacing: 10px; line-height: 100px;">
						Wings
					</p>
				</a>
			</li>
			<li>
				<a href="saladMenu.php" target="content" class="yellow">
					<p style="font-size: 40px; letter-spacing: 10px; line-height: 100px;">
						Salad
					</p>
				</a>
			</li>
			<li>
				<a href="popMenu.php" target="content" class="teal">
					<p style="font-size: 40px; letter-spacing: 10px; line-height: 100px;">
						Pop
					</p>
				</a>
			</li>
			<li>
				<a href="orderHistory.php" target="content" class="green">
					<p style="font-size: 40px; letter-spacing: 10px; line-height: 50px;">
						Order<br/>History
					</p>
				</a>
			</li>
		</ul>

	</div>
	
	
	<div class="column content" style="padding-top: 5px;">
	
		<iframe name="content" src="pizzaMenu.php" frameborder="0" width="75%" height="950px" style="border: none; position: absolute;">
		</iframe>
	
	</div>
	
	

</body>

</html>

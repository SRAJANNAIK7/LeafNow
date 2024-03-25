<?php
	if(isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] == 1)
	{
		$loginProfile = "My Profile: ". $_SESSION['Username'];
		$logo = "glyphicon glyphicon-user";
		if($_SESSION['Category']!= 1)
		{
			$link = "Login/profile.php";
		}
		else {
				$link = "profileView.php";
		}
	}
	else
	{
		$loginProfile = "Login";
		$link = "index.php";
		$logo = "glyphicon glyphicon-log-in";
	}
?>

<!DOCTYPE html>

			<header id="header">
				<h1><a href="index.php">LEAF NOW</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="<?= $link; ?>"><span class="<?php echo $logo; ?>"></span><?php echo" ". $loginProfile; ?></a></li>
						<li><a href="market.php"><span class="glyphicon glyphicon-grain"> Market</a></li>
						<li><a href="myCart.php"><span class="glyphicon glyphicon-shopping-cart"> Cart</a></li>
						<li><a href="serviceView.php"><span class="glyphicon glyphicon-comment"> Services</a></li>
						<li><a href="blogView.php"><span class="glyphicon glyphicon-comment"> Discussions</a></li>
						<li><button type="button" style="font-size:18px;color:#CEE8D8; width:18px; cursor: pointer; background-color:transparent;" class="fa fa-print fa-2x" OnClick="window.print()">Print</button></li>
						
					</ul>
				</nav>
			</header>

	</body>
</html>

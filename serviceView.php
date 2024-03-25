<?php
	session_start();

	require 'db.php';

	if(!isset($_SESSION['logged_in']) OR $_SESSION['logged_in'] == 0)
	{
		$_SESSION['message'] = "You need to first login to access this page !!!";
		header("Location: Login/error.php");
	}
	if ($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] == 1)
	{
		if(isset($_POST['comment']) AND $_POST['comment'] != "")
		{
			$sql = "SELECT * FROM servicedata ORDER BY serviceId DESC";
			$result = mysqli_query($conn, $sql);

			while($row = $result->fetch_array())
			{
				$check = "submit".$row['serviceId'];
				if(isset($_POST[$check]))
				{
					$serviceId = $row['serviceId'];
					break;
	 			}
			}

			$comment = dataFilter($_POST['comment']);
			if(isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] == 1)
			{
				$servicetUser = $_SESSION['Username'];
				$pic = $_SESSION['picName'];
			}
			else {
				$servicetUser = "Anonymous";
				$pic = "profile0.png";
			}
			if(isset($serviceId))
			{
				$sql = "INSERT INTO servicefeedback (serviceId, comment, servicetUser, servicePic)
						VALUES ('$serviceId' ,'$comment', '$servicetUser', '$pic');";
				$result = mysqli_query($conn, $sql);
			}
		}
	}
		

	function dataFilter($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$sql = "SELECT * FROM servicedata ORDER BY serviceId DESC";
	$result = mysqli_query($conn, $sql);

	function formatDate($date)
	{
		return date('g:i a', strtotime($date));
	}

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>LEAF NOW : Service</title>
		<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="bootstrap\js\bootstrap.min.js"></script>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<link rel="stylesheet" href="css/skel.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/style-xlarge.css" />
		<link rel="stylesheet" href="Blog/commentBox.css" />
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
		<link rel="stylesheet" href="indexfooter.css" />

	</head>
	<body class="subpage">

		<?php
			require 'menu.php';

		?>

			<section id="main" class="wrapper">
				<div class="inner">
					<div class="container" style="width: 70%">
					<div class="row uniform">
						<div class="9u 12u$(small)">

						</div>
						<div class="3u 12u$(small)">
							<a href="servicewrite.php" class="button"><span class="glyphicon glyphicon-pencil"></span> Write about your Service</a>
						</div>
					</div>
					<br />
					<?php
						while($row = $result->fetch_array()) :
							$id = $row['serviceId'];
							$sql = "SELECT * FROM servicefeedback WHERE serviceId = '$id'";
							$result1 = mysqli_query($conn, $sql);
							$numComment = mysqli_num_rows($result1);
					?>
					<div class="box">
						<h2><?= $row['serviceTitle']; ?></h2>
						<blockquote>
							<?= $row['serviceContent']; ?>
							<p>--- <?= $row['serviceUser']; ?></p>
							<p><?= $row['serviceTime']; ?></p>
						</blockquote>

						<form method="post" action="serviceView.php">
							<div class="row">
								<div class="6u 12u$(xsmall)">
									<button class = "button special small" name="<?php echo 'like'.$id; ?>">
									<span class="glyphicon glyphicon-thumbs-up"></span> Like</button>
									<span><?= $row['likes']?></span>
								</div> 
								<div class="6u 12u$(xsmall)">
									<span class="glyphicon glyphicon-pencil"></span> Comments : <?= $numComment ?></button>
								</div>
								<div class="12u$">
									<br>
									<textarea name="comment" id="comment" rows="1" placeholder="Write a Comment!"></textarea>
								</div>
								<div class="12u$">
									<center>
									<br>
									<input type="submit" name="<?php echo 'submit'.$id; ?>" class="button special small" value="Submit"/>
									</center>
								</div>
							</div>
						</form>

						<?php
							if($result1) :
								while($row1 = $result1->fetch_array()) :
						?>
							<div class="con darker">
								<img src="<?php echo 'images/profileImages/'.$row1['servicePic']?>" alt="Avatar"><span><em><?= $row1['servicetUser']; ?></em></span>
								<br>
								<?= $row1['comment']; ?>
								<span class="time-right"><?= formatDate($row1['serviceTime']); ?></span>
							</div>

							<?php endwhile; ?>
						<?php endif; ?>
					</div>

					<?php endwhile; ?>

				</div>
			</section>

		<script>

		

		</script>


		<script src="jquery/jquery-3.2.1.min.js"></script>
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<footer class="footer-distributed" style="background-color:black" id="aboutUs">
		<center>
			<h1 style="font: 35px Times New Roman;">About Us</h1>
		</center>
		<div class="footer-left">
			<h3 style="font-family: 'Times New Roman', cursive;">LEAF NOW &copy; </h3>
		
			<br />
			<p style="font-size:20px;color:white"></p>
			<br />
		</div>

		<div class="footer-center">
			<div>
				<i class="fa fa-map-marker"></i>
				<p style="font-size:20px">BENGALURU</p>
			</div>
			<div>
				<i class="fa fa-phone"></i>
				<p style="font-size:20px">1234567890</p>
			</div>
			<div>
				<i class="fa fa-envelope"></i>
				<p style="font-size:20px"><a href="mailto:agroculture@gmail.com" style="color:white">LEAFNOW@leafnow.COM</a></p>
			</div>
		</div>

		<div class="footer-right">
			<p class="footer-company-about" style="color:white">
				<span style="font-size:20px"><b>About LEAF NOW</b></span>
				LEAF NOW is a platform that helps nature enthusiasts to SELL/BUY/DONATE Plants and Seeds...
			</p>
			<div class="footer-icons">
				<a  href="#"><i style="margin-left: 0;margin-top:5px;"class="fa fa-facebook"></i></a>
				<a href="#"><i style="margin-left: 0;margin-top:5px" class="fa fa-instagram"></i></a>
				<a href="#"><i style="margin-left: 0;margin-top:5px" class="fa fa-youtube"></i></a>
			</div>
		</div>

	</footer>

	</body>
</html>

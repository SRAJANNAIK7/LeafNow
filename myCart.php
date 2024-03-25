<?php
	session_start();
	require 'db.php';
    if(!isset($_SESSION['logged_in']) OR $_SESSION['logged_in'] == 0)
	{
		$_SESSION['message'] = "You need to first login to access this page !!!";
		header("Location: Login/error.php");
	}
    $bid = $_SESSION['id'];
    if(isset($_GET['flag']))
    {
        $pid = $_GET['pid'];

        $sql = "INSERT INTO mycart (bid,pid)
               VALUES ('$bid', '$pid')";
        $result = mysqli_query($conn, $sql);
    }

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>LEAF NOW: Basket</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="bootstrap\js\bootstrap.min.js"></script>
		<link rel="stylesheet" href="login.css"/>
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
		<link rel="stylesheet" href="indexfooter.css" />

	</head>
	<body class>

		<?php
			require 'menu.php';
			function dataFilter($data)
			{
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
		?>

		<!-- One -->
			<section id="main" class="wrapper style1 align-center" >
				<div class="container">
						<h2>My Cart</h2>

				<section id="two" class="wrapper style2 align-center">
				<div class="container">
					<div class="row">
					<?php
                        $sql = "SELECT * FROM mycart WHERE bid = '$bid'";
                        $result = mysqli_query($conn, $sql);
						while($row = $result->fetch_array()):
                            $pid = $row['pid'];
                            $sql = "SELECT * FROM product WHERE pid = '$pid'";
                            $result1 = mysqli_query($conn, $sql);
                            $row1 = $result1->fetch_array();
							$picDestination = "images/productImages/".$row1['pimage'];
						?>
							<div class="col-md-4">
							<section>
							<strong><h2 class="title" style="color:black; "><?php echo $row1['product'].'';?></h2></strong>
							<a href="review.php?pid=<?php echo $row1['pid'] ;?>" > <img class="image fit" src="<?php echo $picDestination;?>" alt=""  /></a>

							<div style="align: left">
							<blockquote><?php echo "Type : ".$row1['pcat'].'';?><br><?php echo "Price : ".$row1['price'].' /-';?><br></blockquote>

						</section>
						</div>

                    <?php endwhile;	?>



					</div>

			</section>
					</header>

			</section>
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
               
			</div>
		</div>

	</body>
</html>

<?php
	session_start();
?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>LEAF NOW : Write about your Service</title>
		<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="../bootstrap\css\bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="../bootstrap\js\bootstrap.min.js"></script>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<link rel="stylesheet" href="css/skel.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/style-xlarge.css" />
		<script src="https://cdn.ckeditor.com/4.8.0/full/ckeditor.js"></script>
	</head>
	<body class="subpage">

		<?php
			require 'menu.php';
		?>


	<form method="post" action="service/serviceSubmit.php">
        <section id="main" class="wrapper">
            <div class="inner">
				<div class="container" style="width: 70%">
				<div class="row uniform">
					<div class="9u 12u$(small)">

					</div>
					<div class="3u 12u$(small)">
						<a href="serviceView.php" class="button special fit">View Services</a>
					</div>
				</div>
				<br />
                <div class="box">
                    <div class="row uniform">
                        <div class="12u$">
                            <input type="text" name="serviceTitle" id="serviceTitle" value="" placeholder="Service Title" required/>
                        </div>
                       	<div class="12u$">
							<textarea name="serviceContent" id="serviceContent" rows="12" placeholder="Service Content"></textarea>
						</div>
						<br>
						<div class="12u$">
						<center>
							<input type="submit" name="submit" class="button special" value="SUBMIT"/>
						</center>
						</div>
                    </div>
                </div>
            </div>
        </section>
    </form>

		<script>
			 CKEDITOR.replace( 'serviceContent' );
		</script>

		<!-- Scripts -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/jquery.scrolly.min.js"></script>
            <script src="assets/js/jquery.scrollex.min.js"></script>
            <script src="assets/js/skel.min.js"></script>
            <script src="assets/js/util.js"></script>
            <script src="assets/js/main.js"></script>

	</body>
</html>

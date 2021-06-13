<?php include 'inc/header.php'; 
		include 'classes/Exam.php';
		$exm = new Exam();
?>

<?php 
	$question = $exm->getQuestion();
	$total = $exm->getTotalRows();
 ?>

<!doctype html>
<html>

<head>
	<title>Online Exam System</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="no-cache">
	<meta http-equiv="Expires" content="-1">
	<meta http-equiv="Cache-Control" content="no-cache">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/coda-slider.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/tooplate_style.css">
</head>

<body>
	<!-- Content from tool -->
	<div id="slider">
		<div id="tooplate_wrapper">
			<div id="tooplate_sidebar">
				<div id="header">
					<h2>Online Exam System</h2>
					<!-- <h1><a href="#"><img src="images/tooplate_logo.png" title="Online Exam System" alt="Notebook free html template" /></a></h1> -->
				</div>

				<div id="menu">
					<ul class="navigation">
						<li><a href="exam.php" class="selected menu_01">Home</a></li>
						<li><a href="study.php" class="menu_02">Study</a></li>
						<li><a href="?action=logoutuser" class="menu_04">Logout</a></li>
					</ul>

				</div>
			</div> <!-- end of sidebar -->

			<div id="content">
				<div class="panel" id="home">
					<div class="content_section">
						<h1>Welcome to Online Exam</h1>
						<h2>Test your knowledge</h2>
						<p>This is multiple choise quiz to test your knowledge</p>
						<ul>
							<li><strong>Number of Questions:</strong><?php echo  $total?></li>
							<li><strong>Question Type:</strong>Multiple choise</li>
						</ul>
						<a class="btn btn-info" href="test.php?q=<?php echo $question['quesNo']; ?>">Start test</a>
						<!-- </div>
					<div class="content_section last_section">
					<h2>Our Services</h2>
					<ul class="service_list">
						<li><a href="#" class="service_one">Maecenas suscipit vulputate dui vel adipiscing</a></li>
						<li><a href="#" class="service_two">Pellentesque habitant morbi tristique senectus</a></li>
						<li><a href="#" class="service_three">Duis at sapien ut sapien commodo molestie</a></li>
						<li><a href="#" class="service_four">Nam porttitor quam eu ante aliquam eu</a></li>
						<li><a href="#" class="service_five">Maecenas posuere fringilla ipsum ut pretium</a></li>
					</ul>
					</div> -->
					</div> <!-- end of home -->
				</div>
			</div> <!-- end of content -->
		</div>
	</div>

	<div id="footer">

		<!-- <div id="social_box">
			<a href="#"><img src="images/facebook.png" alt="facebook" /></a>
			<a href="#"><img src="images/flickr.png" alt="flickr" /></a>
			<a href="#"><img src="images/myspace.png" alt="myspace" /></a>
			<a href="#"><img src="images/twitter.png" alt="twitter" /></a>
			<a href="#"><img src="images/youtube.png" alt="youtube" /></a>
		</div> -->

		<div id="footer_left">

			Copyright © 2021 <a href="#">Abir</a><br />

		</div>

		<div class="cleaner"></div>
	</div>

	<!-- content from tool end -->


	<script src="js/jquery.js"></script>
	<script src="js/main.js"></script>
</body>

</html>
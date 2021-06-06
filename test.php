<?php include 'inc/header.php';
	include 'classes/Exam.php';
	include 'classes/Process.php';
		$exm = new Exam();
		$pro = new Process();
 ?>


<?php 
	if (isset($_GET['q'])) {
		$number = (int)$_GET['q'];
	}else{
		// header("Location: exam.php");
		echo("<script>location.href = 'exam.php';</script>");
	}
	$total = $exm->getTotalRows();
	$question = $exm->getQuesByNumber($number);
 ?>

 <?php 
 	if ($_SERVER['REQUEST_METHOD']=='POST') {
 		$process = $pro->processData($_POST);
 	}
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
						<!-- <li><a href="#services" class="menu_03">Services</a></li> -->
						<!-- <li><a href="#gallery" class="menu_04">Gallery</a></li> -->
						<!-- <li><a href="#contactus" class="menu_05">Contact</a></li> -->
					</ul>

				</div>
			</div> <!-- end of sidebar -->

			<div id="content">
				<div class="panel" id="home">
					<div class="content_section">
						<h1>Question <?php echo $question['quesNo'] ?> of <?php echo $total; ?></h1>

						<form method="post" action="">
							<table> 
								<tr>
									<td colspan="2">
									<h3>Que <?php echo $question['quesNo'] ?>: <?php echo $question['ques'] ?></h3>
									</td>
								</tr>
								
								<?php 
									$answer = $exm->getAnswer($number);
									if ($answer) {
										while($result = $answer->fetch_assoc()){
								?>
								
								<tr>
									<td>
									<input type="radio" name="ans" id="<?php echo $result['id'];?>" value="<?php echo $result['id'];?>" /><label for="<?php echo $result['id'];?>"><?php echo $result['ans'];?></label>
									</td>
								</tr>

								<?php			
										}
									}
								?>

								
								<tr>
								<td>
									<input type="submit" name="submit" value="Next Question"/>
									<input type="hidden" name="number" value="<?php echo $number;?>" />
								</td>
								</tr>

								
							</table>
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
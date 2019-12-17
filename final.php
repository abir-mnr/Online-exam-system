<?php include 'inc/header.php'; 
	include_once 'lib/Session.php';
	include 'classes/Process.php';
?>


<div class="main">
<h1>You are done! </h1>
	<div class="starttest">
		<p>Congratulation! You have just completed the test</p>
		<p>Final Score: 
			<?php
			 	echo $_SESSION['score'];
			 	$_SESSION['score']=0;
			?>
		</p>
		<a href="viewans.php">View Answers</a>
		<a href="starttest.php">Start test</a>
	</div>
	
  </div>
<?php include 'inc/footer.php'; ?>
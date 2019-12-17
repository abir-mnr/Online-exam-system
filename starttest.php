<?php include 'inc/header.php'; 
		include 'classes/Exam.php';
		$exm = new Exam();
?>

<?php 
	$question = $exm->getQuestion();
	$total = $exm->getTotalRows();
 ?>

<div class="main">
<h1>Welcome to Online Exam</h1>
	<div class="starttest">
		<h2>Test your knowledge</h2>
		<p>This is multiple choise quiz to test your knowledge</p>
		<ul>
			<li><strong>Number of Questions:</strong><?php echo  $total?></li>
			<li><strong>Question Type:</strong>Multiple choise</li>
		</ul>
		<a href="test.php?q=<?php echo $question['quesNo']; ?>">Start test</a>
	</div>
</div>
<?php include 'inc/footer.php'; ?>
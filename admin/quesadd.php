<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/Exam.php');
	$exm = new Exam();
?>
<style>
	.adminpanel{
		width: 500px;
		color: #999;
		margin: 30px auto 0;
		padding: 10px;
		border: 1px solid #ddd;
	}
</style>


<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$addque = $exm->addQuestions($_POST);
	}

	//get total
	$total = $exm->getTotalRows();
	$next = $total+1;
 ?>

<div class="main">

	<?php 
		if (isset($addque)) {
			echo $addque;
		}
	 ?>
	<div class="adminpanel">
		<form action="" method="post">
			<table>
				<tr>
					<td>Question No</td>
					<td>:</td>
					<td><input type="number" value="<?php if(isset($next)){
						echo $next;
					}?>" name="quesno"></td>
				</tr>
				<tr>
					<td>Question</td>
					<td>:</td>
					<td><input type="text" name="ques" placeholder="Enter question" required></td>
				</tr>
				<tr>
					<td>Choise one</td>
					<td>:</td>
					<td><input type="text" name="ans1" placeholder="Enter choise one" required></td>
				</tr>
				<tr>
					<td>Choise two</td>
					<td>:</td>
					<td><input type="text" name="ans2" placeholder="Enter choise two" required></td>
				</tr>
				<tr>
					<td>Choise three</td>
					<td>:</td>
					<td><input type="text" name="ans3" placeholder="Enter choise three" required></td>
				</tr>
				<tr>
					<td>Choise four</td>
					<td>:</td>
					<td><input type="text" name="ans4" placeholder="Enter choise four" required></td>
				</tr>
				<tr>
					<td>Currect number</td>
					<td>:</td>
					<td><input type="number" name="correctAns" placeholder="Enter correct answer no" required></td>
				</tr>
				<tr>
					<td>Question for study page</td>
					<td>:</td>
					<td><input type="text" name="ques_for_study" placeholder="Enter question" required></td>
				</tr>
				<tr>
					<td>Answer for study page</td>
					<td>:</td>
					<td><input type="text" name="ans_for_study" placeholder="Enter answer" required></td>
				</tr>
				<tr>
					<td>Explanation for the answer</td>
					<td>:</td>
					<td><input type="text" name="exp_for_study" placeholder="Enter explanation of the answer"></td>
				</tr>
				<tr>
					<td colspan="3" align="center">
						<input type="submit" value="Add a Question">
					</td>
				</tr>
			</table>
		</form>
	</div>


	
</div>
<?php include 'inc/footer.php'; ?>
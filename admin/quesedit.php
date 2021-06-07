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
    if(isset($_GET['no']) && $_GET['no'] != null){
        $quesNo =  $_GET['no'];
		$question = $exm->getQuesByNumber($quesNo);
		$answers = $exm->getAnswer($quesNo);
		$correctAns = '';
		$answer=[];
		$i = 1;
		while($ans = $answers->fetch_assoc()){
			array_push($answer, $ans['ans']);
			if($ans['correctAns'] == 1){
				$correctAns = $i;
			}
			$i++;
		}
    }
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$editque = $exm->editQuestions($_POST);
	}
 ?>

<div class="main">

	<?php 
		if (isset($editque)) {
			echo $editque;
		}
	 ?>
	<div class="adminpanel">
		<form action="" method="post">
			<table>
				<tr>
					<td>Question No</td>
					<td>:</td>
					<td><input type="number" value="<?php if(isset($quesNo)){
						echo $quesNo;
					}?>" name="quesno"></td>
				</tr>
				<tr>
					<td>Question</td>
					<td>:</td>
					<td><input type="text" name="ques" placeholder="Enter question" value="<?php echo $question['ques']?>" required></td>
				</tr>
				<tr>
					<td>Choise one</td>
					<td>:</td>
					<td><input type="text" name="ans1" placeholder="Enter choise one" value="<?php echo $answer[0]?>" required></td>
				</tr>
				<tr>
					<td>Choise two</td>
					<td>:</td>
					<td><input type="text" name="ans2" placeholder="Enter choise two" value="<?php echo $answer[1]?>" required></td>
				</tr>
				<tr>
					<td>Choise three</td>
					<td>:</td>
					<td><input type="text" name="ans3" placeholder="Enter choise three" value="<?php echo $answer[2]?>" required></td>
				</tr>
				<tr>
					<td>Choise four</td>
					<td>:</td>
					<td><input type="text" name="ans4" placeholder="Enter choise four" value="<?php echo $answer[3]?>" required></td>
				</tr>
				<tr>
					<td>Currect number</td>
					<td>:</td>
					<td><input type="number" name="correctAns" placeholder="Enter correct answer no" value="<?php echo $correctAns?>" required></td>
				</tr>
				<tr>
					<td>Question for study page</td>
					<td>:</td>
					<td><input type="text" name="ques_for_study" placeholder="Enter question" value="<?php echo $question['ques_for_study']?>" required></td>
				</tr>
				<tr>
					<td>Answer for study page</td>
					<td>:</td>
					<td><input type="text" name="ans_for_study" placeholder="Enter answer" value="<?php echo $question['ans_for_study']?>" required></td>
				</tr>
				<tr>
					<td>Explanation for the answer</td>
					<td>:</td>
					<td><input type="text" name="exp_for_study" placeholder="Enter explanation of the answer" value="<?php echo $question['exp_for_study']?>"></td>
				</tr>
				<tr>
					<td colspan="3" align="center">
						<input type="submit" value="Save">
					</td>
				</tr>
			</table>
		</form>
	</div>


	
</div>
<?php include 'inc/footer.php'; ?>
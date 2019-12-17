<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/inc/header.php');
    include_once ($filepath.'/../classes/Exam.php');
	$exm = new Exam();
?>

<?php 
	if (isset($_GET['delque'])) {
		$quesno = (int)$_GET['delque'];
		$delque = $exm->delQuestion($quesno);
	}
 ?>


<div class="main">
	
	<?php 
		if (isset($delque)) {
			echo $delque;
		}
	 ?>

	<div class="manageuser">
		<table class="tblone">
			<tr>
				<th width="10%">No</th>
				<th width="75%">Questions</th>
				<th width="15%">Action</th>
			</tr>

<?php 

	$getData = $exm->getQueByOrder();
	if ($getData) {
		$i = 0;
		while ($result = $getData->fetch_assoc()){
			$i++;
?>

			<tr>
				<td><?php echo $i; ?></td>
				<td><?php  echo $result['ques'];?></td>
				<td>	 
					<a onclick="return confirm('Are you sure to delete?')" href="?delque=<?php  echo $result['quesNo'];?>">Remove</a>
					
					
				</td>
			</tr>
<?php  	
		}
 	 }
?>
		</table>
	</div>
</div>


	
</div>
<?php include 'inc/footer.php'; ?>
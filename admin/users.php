<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/inc/header.php');
    include_once ($filepath.'/../classes/User.php');
	$usr = new User();
?>

<?php 
	if (isset($_GET['dis'])) {
		$disid = (int) $_GET['dis'];
		$disuser = $usr->disableUser($disid);
	}

	if (isset($_GET['en'])) {
		$enid = (int) $_GET['en'];
		$enuser = $usr->enableUser($enid);
	}

	if (isset($_GET['del'])) {
		$delid = (int) $_GET['del'];
		$deluser = $usr->deleteUser($delid);
	}
 ?>

<div class="main">
	<?php 
		if (isset($disuser)) {
			echo $disuser;
		}

		if (isset($enuser)) {
			echo $enuser;
		}

		if (isset($deluser)) {
			echo $deluser;
		}
	 ?>
	<div class="manageuser">
		<table class="tblone">
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Username</th>
				<th>Email</th>
				<th>Action</th>
			</tr>

<?php 
	$userData = $usr->getAllUser();
	if ($userData) {
		$i = 0;
		while ($result = $userData->fetch_assoc()){
			$i++;
	
?>

			<tr>
				<td><?php if ($result['status']=='1'){
					echo "<span class='error'> $i</span>";
				}else{
					echo $i;
				}
				 ?></td>
				<td><?php echo $result['name']; ?></td>
				<td><?php echo $result['username']; ?></td>
				<td><?php echo $result['email']; ?></td>
				<td>
					<?php 
						if ($result['status']=='0') {?>

						<a onclick="return confirm('Are you sure to Disable?')" href="?dis=<?php echo $result['userid'];?>">Disable</a>
							
					<?php } else{?>
						<a onclick="return confirm('Are you sure to Enable?')" href="?en=<?php echo $result['userid'];?>">Enable</a>

					<?php } ?>
					 

					|<a onclick="return confirm('Are you sure to delete?')" href="?del=<?php echo $result['userid'];?>">Remove</a>
					
					
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
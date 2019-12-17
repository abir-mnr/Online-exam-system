<?php include_once 'inc/loginheader.php';
	include_once 'classes/User.php';
	$usr = new User();
 ?>

<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$userData = $usr->getUserData($_POST);
	}
 ?>

<div class="main">
<h1>Online Exam System - User Login</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/test.png"/>
	</div>
	<div class="segment">
	<form action="" method="post">
		<table class="tbl">    
			 <tr>
			   <td>Username</td>
			   <td><input name="email" type="text"></td>
			 </tr>
			 <tr>
			   <td>Password </td>
			   <td><input name="password" type="password"></td>
			 </tr>
			 
			  <tr>
			  <td></td>
			   <td><input type="submit" name="loginuser" value="Login">
			   </td>
			 </tr>
			 <tr>
				
				<td colspan="2">
					<?php 
						if (isset($userData)) {
							echo $userData;
						}
					?>
				</td>
			</tr>
       </table>
	   </form>
	   <p>New User ? <a href="register.php">Signup</a> Free</p>
	</div>


	
</div>
<?php include 'inc/footer.php'; ?>
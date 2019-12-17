<?php include 'inc/loginheader.php';
      include_once 'classes/User.php';
 ?>
<?php 
  $user = new User(); 
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $usrRegi = $user->userRegistration($_POST);
  }
?>

<div class="main">
<h1>Online Exam System - User Registration</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/regi.png"/>
	</div>
	<div class="segment">

<?php 
  if (isset($usrRegi)) {
    echo $usrRegi;
  }
 ?>

	<form action="" method="post">
		<table>
		<tr>
           <td>Name</td>
           <td><input type="text" name="name"></td>
         </tr>
		<tr>
           <td>Username</td>
           <td><input name="username" type="text" id="name"></td>
         </tr>
         <tr>
           <td>Password</td>
           <td><input type="password" name="password"></td>
         </tr>
         
         <tr>
           <td>E-mail</td>
           <td><input name="email" type="text" ></td>
         </tr>
         <tr>
           <td></td>
           <td><input type="submit" name="register" value="Signup">
           </td>
         </tr>
       </table>
	   </form>
	   <p>Already Registered ? <a href="index.php">Login</a> Here</p>
	</div>


	
</div>
<?php include 'inc/footer.php'; ?>
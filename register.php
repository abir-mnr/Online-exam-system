<?php include 'inc/loginheader.php';
include_once 'classes/User.php';
?>
<?php
$user = new User();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
  $usrRegi = $user->userRegistration($_POST);
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
            <li><a href="index.php" class="menu_01">Home</a></li>
            <li><a href="admin" class="menu_02">Admin Login</a></li>
            <li><a href="register.php" class="selected menu_03">Registration</a></li>
            <!-- <li><a href="#gallery" class="menu_04">Gallery</a></li> -->
            <!-- <li><a href="#contactus" class="menu_05">Contact</a></li> -->
          </ul>

        </div>
      </div> <!-- end of sidebar -->

      <div id="content">
        <div class="panel" id="home">
          <div class="content_section">
            <h1>Online Exam System - User Registeration</h1>
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
                    <td><input name="email" type="text"></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td><input class="btn btn-primary" type="submit" name="register" value="Signup">
                    </td>
                  </tr>
                </table>
              </form>
              <p>Already Registered ? <a href="index.php">Login</a> Here</p>

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
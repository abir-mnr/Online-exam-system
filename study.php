<?php include 'inc/header.php';
include 'classes/Exam.php';
include 'classes/Process.php';
$exm = new Exam();
$pro = new Process();
?>


<?php
$total = $exm->getTotalRows();
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
                        <li><a href="exam.php" class="menu_01">Home</a></li>
                        <li><a href="study.php" class="selected menu_02">Study</a></li>
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
                        <h1>Question And Answer total:<?php echo $total ?></h1>
                        <table>

                            <?php
                            $getQues = $exm->getQueByOrder();
                            $answerString = "";
                            if ($getQues) {
                                while ($question = $getQues->fetch_assoc()) {

                            ?>

                                    <tr>
                                        <td colspan="2">
                                            <h3>Que <?php echo $question['quesNo'] ?>: <?php echo $question['ques'] ?></h3>
                                        </td>
                                    </tr>

                                    <?php
                                    $number = $question['quesNo'];
                                    $answer = $exm->getAnswer($number);
                                    if ($answer) {
                                        $answerNumber = 0;
                                        while ($result = $answer->fetch_assoc()) {
                                    ?>

                                        <tr>
                                            <td>
                                                <input type="radio" />
                                                <?php
                                                if ($result['correctAns'] == '1') {
                                                    $answerAlpha = '';
                                                    if ($answerNumber == 0) {
                                                        $answerAlpha = 'a';
                                                    } else if ($answerNumber == 1) {
                                                        $answerAlpha = 'b';
                                                    } else if ($answerNumber == 2) {
                                                        $answerAlpha = 'c';
                                                    } else if ($answerNumber == 3) {
                                                        $answerAlpha = 'd';
                                                    }
                                                    echo $result['ans'];
                                                    $answerString = $answerString . "Ques-" . $number . ": {$answerAlpha}) " . $result['ans'] . ",   ";
                                                } else {
                                                    echo $result['ans'];
                                                }
                                                ?>
                                            </td>
                                        </tr>

                                    <?php
                                            $answerNumber++;
                                        }
                                    }
                                    ?>
                                <tr>
                                    <td>
                                        <br>
                                    </td>
                                </tr>
                            <?php
                                }
                            }
                            ?>
                            <tr>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td>Answers: </td>
                            </tr>
                            <tr>
                                <td><?php echo $answerString; ?></td>
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
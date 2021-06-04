<?php 

    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Session.php');
    // Session::init();
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');

	class Process
	{
		private $db;
		private $fm;
		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function processData($data){
			$selectedAns = $data['ans'];
			$number = $data['number'];
			$next = $number+1;

			if (!isset($_SESSION['score'])) {
				$_SESSION['score'] = '0';
			}

			$total = $this->getTotal();
			$correct =$this->correctAns($number);
			if ($correct == $selectedAns) {
				$_SESSION['score']++;
			}

			if ($number == $total) {
//				header("Location: final.php");
                                echo("<script>location.href = 'final.php';</script>");
				exit();
			}else{
//				header("Location: test.php?q=".$next);
                                echo("<script>location.href = 'test.php?q='+$next;</script>");
			}

		}

		private function getTotal(){
			$query = "SELECT * FROM tbl_ques";
			$getResult = $this->db->select($query);
			$total = $getResult->num_rows;
			return $total;
		}

		private function correctAns($number){
			$query = "SELECT * FROM tbl_ans WHERE quesNo = '$number' AND correctAns ='1'";
			$getData = $this->db->select($query)->fetch_assoc();
			$result = $getData['id'];
			return $result;
		}
	}
?>
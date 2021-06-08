<?php 

    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');

	class Exam
	{
		private $db;
		private $fm;
		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function addQuestions($data){
			$quesno = $data['quesno'];
			$ques = mysqli_real_escape_string($this->db->link, $data['ques']);
			$quesForStudy =  mysqli_real_escape_string($this->db->link, $data['ques_for_study']);
			$ansForStudy = mysqli_real_escape_string($this->db->link, $data['ans_for_study']);
			$expForStudy = mysqli_real_escape_string($this->db->link, $data['exp_for_study']);
			$ans = array();
			$ans[1]=mysqli_real_escape_string($this->db->link, $data['ans1']);
			$ans[2]=mysqli_real_escape_string($this->db->link, $data['ans2']);
			$ans[3]=mysqli_real_escape_string($this->db->link, $data['ans3']);
			$ans[4]=mysqli_real_escape_string($this->db->link, $data['ans4']);
			$correctAns = $data['correctAns'];
			$query = "INSERT INTO tbl_ques(quesNo,ques,ques_for_study,ans_for_study,exp_for_study) VALUES('$quesno','$ques','$quesForStudy','$ansForStudy','$expForStudy')";
			$insert_row = $this->db->insert($query);
			if ($insert_row) {
				foreach ($ans as $key=> $answer) {
					if ($answer!='') {
						if ($correctAns == $key) {
							$rquery = "INSERT INTO tbl_ans(quesNo,correctAns,ans) VALUES('$quesno','1','$answer')";
						}else{
							$rquery = "INSERT INTO tbl_ans(quesNo,correctAns,ans) VALUES('$quesno','0','$answer')";
						}
						$insertrow = $this->db->insert($rquery);
						if ($insertrow) {
							continue;
						}else{
							die('Error');
						}
					}
				}

				$msg = "<span class='success'>Question inserted successfully</span>";
				return $msg;
			}
		}

		public function editQuestions($data){
			$quesno = $data['quesno'];
			$ques = mysqli_real_escape_string($this->db->link, $data['ques']);
			$quesForStudy =  mysqli_real_escape_string($this->db->link, $data['ques_for_study']);
			$ansForStudy = mysqli_real_escape_string($this->db->link, $data['ans_for_study']);
			$expForStudy = mysqli_real_escape_string($this->db->link, $data['exp_for_study']);
			$ans = array();
			$ans[1]=mysqli_real_escape_string($this->db->link, $data['ans1']);
			$ans[2]=mysqli_real_escape_string($this->db->link, $data['ans2']);
			$ans[3]=mysqli_real_escape_string($this->db->link, $data['ans3']);
			$ans[4]=mysqli_real_escape_string($this->db->link, $data['ans4']);
			$correctAns = $data['correctAns'];
			$query = "UPDATE tbl_ques SET ques='$ques',ques_for_study='$quesForStudy',ans_for_study='$ansForStudy',exp_for_study='$expForStudy' WHERE quesNo='$quesno'";
			$update = $this->db->update($query);
			if ($update) {
				$query = "DELETE FROM tbl_ans WHERE quesNo = '$quesno'";
				$this->db->delete($query);
				foreach ($ans as $key=> $answer) {
					if ($answer!='') {
						if ($correctAns == $key) {
							$rquery = "INSERT INTO tbl_ans(quesNo,correctAns,ans) VALUES('$quesno','1','$answer')";
						}else{
							$rquery = "INSERT INTO tbl_ans(quesNo,correctAns,ans) VALUES('$quesno','0','$answer')";
						}
						$insertrow = $this->db->insert($rquery);
						if ($insertrow) {
							continue;
						}else{
							die('Error');
						}
					}
				}

				$msg = "<span class='success'>Question Updated successfully</span>";
				return $msg;
			}
		}

		public function getQueByOrder(){
			$query = "SELECT * FROM tbl_ques ORDER BY quesNo ASC";
			$result = $this->db->select($query);
			return $result;
		}


		public function delQuestion($quesno){
			$tables = array("tbl_ques" , "tbl_ans");
			foreach ($tables as $table) {
				$query = "DELETE FROM $table WHERE quesNo='$quesno'";
				$result = $this->db->delete($query);
			}
			if ($result) {
				$msg = "<span class='success'>Data deleted successfully</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Data did not deleted</span>";
				return $msg;
			}
			
		}

		public function getTotalRows(){
			$query = "SELECT * FROM tbl_ques";
			$getResult = $this->db->select($query);
			$total = $getResult->num_rows;
			return $total;
		}

		public function getQuestion(){
			$query = "SELECT * FROM tbl_ques";
			$getData = $this->db->select($query);
			$result = $getData->fetch_assoc();
			return $result;
		}
		
		public function getQuesByNumber($number){
			$query = "SELECT * FROM tbl_ques WHERE quesNo = '$number'";
			$getData = $this->db->select($query);
			$result = $getData->fetch_assoc();
			return $result;
		}

		public function getAnswer($number){
			$query = "SELECT * FROM tbl_ans WHERE quesNo = '$number' order by id";
			$getData = $this->db->select($query);
			return $getData;
		}
	}
 ?>
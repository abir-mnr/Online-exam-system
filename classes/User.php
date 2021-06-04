<?php 

    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');

	class User
	{
		private $db;
		private $fm;
		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
		}

		// public function emailCheck($email){
		// 	$sql = "SELECT email FROM tbl_user WHERE email='$email'";
		// 	$query = $this->db->select($sql);
		// 	if($query->rowCount()>0){
		// 		return true;
		// 	}else{
		// 		return false;
		// 	}
		// }


		public function userRegistration($data){
			$name = $data['name'];
			$username = $data['username'];
			$email = $data['email'];
			$pass = $data['password'];
			// $repass = $data['repass'];
			// $checkmail = $this->emailCheck($email);
			// if($pass != $repass){
			// 	 $msg="<div class='alert alert-danger'>Password didn't match</div>";
			// 	 return $msg;
			// }

			if($name==""||$username==""||$email==""||$pass==""){
				$msg = "<div class='alert alert-danger'>Fields must not be empty</div>";
				return $msg;
			}

			if(filter_var($email, FILTER_VALIDATE_EMAIL) ===false){
				 $msg="<div class='alert alert-danger'>Invalid Email address</div>";
				 return $msg;
			}

			// if($checkmail){
			// 	$msg="<div class='alert alert-danger'>Email already exists</div>";
			// 	 return $msg;
			// }

			else{
				$pass = md5($pass);
				$sql = "INSERT INTO tbl_user (name,username,email,password) VALUES ('$name','$username','$email','$pass')";
				$query = $this->db->insert($sql);
				$msg="<div class='alert  alert-success'>Data inserted successfully</div>";
				 return $msg;
			}
		}

		public function getAdminData($data){
			$adminUser = $this->fm->validation($data['adminUser']);
			$adminPass = $this->fm->validation($data['adminPass']);
			$adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
			$adminPass = mysqli_real_escape_string($this->db->link, md5($adminPass));
		}

		public function getAllUser(){
			$query = "SELECT * FROM tbl_user";
			$result = $this->db->select($query);
			return $result;
		}

		public function disableUser($userid){
			$query = "UPDATE tbl_user SET status ='1' WHERE userid = '$userid'";
			$disableuser = $this->db->update($query);
			if ($disableuser) {
				$msg = "<span class='success'>User disabled !</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>User <b>Not</b> disabled !</span>";
			}
		}

		public function enableUser($userid){
			$query = "UPDATE tbl_user SET status ='0' WHERE userid = '$userid'";
			$enableuser = $this->db->update($query);
			if ($enableuser) {
				$msg = "<span class='success'>User enabled !</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>User <b>Not</b> enabled !</span>";
			}
		}

		public function deleteUser($userid){
			$query = "DELETE FROM tbl_user WHERE userid = '$userid'";
			$deleteuser = $this->db->delete($query);
			if ($deleteuser) {
				$msg = "<span class='success'>User deleted !</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>User <b>Not</b> deleted !</span>";
			}
		}

		public function getUserData($data){
			$email = $this->fm->validation($data['email']);
			$pass = $this->fm->validation($data['password']);
			$email = mysqli_real_escape_string($this->db->link, $email);
			$pass = mysqli_real_escape_string($this->db->link, md5($pass));
			$query = "SELECT * FROM tbl_user WHERE email='$email' AND password = '$pass'";
			$result = $this->db->select($query);
			if ($result != false) {
				$value = $result->fetch_assoc();
				Session::init();
				Session::set("userlogin", true);
				Session::set("email", $value['email']);
				Session::set("userid", $value['userid']);
//				header("Location: exam.php");
                                echo("<script>location.href = '/exam.php';</script>");
			}else{
				$msg = "<span class='error'>Username or password not matched!</span>";
				return $msg;
			}
		}
	}
 ?>
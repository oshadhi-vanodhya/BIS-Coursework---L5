<?php
include ("../public/config.php");
//include("../public/class.supervisee.php");
//include("../public/class.supervisor.php");
//include("../public/class.PSession.php");


class User{

public $db;

		public function __construct(){
		$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

		if(mysqli_connect_errno()) {
		echo "Error: Could not connect to database.";
		exit;
		}
		}

		





        /*** Dinusha aiya   ***/
		public function check_new_register($username, $password){

			$sql="SELECT * FROM users WHERE uname='$username' ";

		/*checking if the username or email is available in db*/
		$check = $this->db->query($sql) ;
		$count_row = $check->num_rows;

		//if the username is not in db then insert to the table
		if ($count_row == 0){
		$sql1="INSERT INTO users SET uname='$username', upass='$password', fullname='$name' ";
		$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
		return $result;
		}
		else { return false;}


		}

















		/*** for registration process ***/
		public function reg_user($name,$username,$password,$email){

		$password = md5($password);
		$sql="SELECT * FROM users WHERE uname='$username' ";

		/*checking if the username or email is available in db*/
		$check = $this->db->query($sql) ;
		$count_row = $check->num_rows;

		//if the username is not in db then insert to the table
		if ($count_row == 0){
		$sql1="INSERT INTO users SET uname='$username', upass='$password', fullname='$name' ";
		$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
		return $result;
		}
		else { return false;}
		}

		/*** for login process 
		public function check_login($username, $password){

		//$password = md5($password);
			$sql2="SELECT uid from users WHERE uname='$username' and upass='$password'";

		//checking if the username is available in the table
		$result = mysqli_query($this->db,$sql2);
		$user_data = mysqli_fetch_array($result);
		$count_row = $result->num_rows;

		if ($count_row == 1) {
		// this login var will use for the session thing
		$_SESSION['login'] = true;
		$_SESSION['uid'] = $user_data['uid'];
		return true;
		}
		else{
		return false;
		}
		}

		/*** for showing the username or fullname ***/
		public function get_fullname($uid){
			$sql3="SELECT fullname FROM users WHERE uid = $uid";
		$result = mysqli_query($this->db,$sql3);
		$user_data = mysqli_fetch_array($result);
		echo $user_data['fullname'];
		}


		
		/*** starting the session ***/
		public function get_session(){
		return $_SESSION['login'];
		}

		public function user_logout() {
		$_SESSION['login'] = FALSE;
		session_destroy();
		}

}

?>
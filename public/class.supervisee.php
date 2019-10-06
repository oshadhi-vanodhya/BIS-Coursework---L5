<?php
require_once ("database.php");


class Student{

  public $student_id;
  public $username;
  public $student_fname;
  public $student_lname;
 
		  
  
	  
  public function check_login($username, $password){
        global $database;
    
		$query="SELECT student_id from slogin WHERE username='$username' and upass='$password'";

		//checking if the username is available in the table
		$result = $database->query($query);
		$resultSet = $database->fetch_array_assoc($result);
		$count_row = $result->num_rows;

		if ($count_row == 1) {
		// this login var will use for the session thing
		$_SESSION['login'] = true;
		
		return true;
		}
		else{
		return false;
		}
    }
    	public function find_student($lecturer_id){
	    	global $database;
   			$sql12="SELECT student_id,student_fname,student_lname from student WHERE lecturer_id= '$lecturer_id'";
   			$result_set =  $database->query($sql12);
				$found = $database->fetch_array($result_set);
				$this->student_id = $found['student_id'];
				$this->$student_fname = $found['student_fname'];
				$this->$student_lname = $found['student_lname'];
				$_SESSION['student_id']= $found['student_id'];
				return $found;
			}	 
    //used for retriewing student details for the new session page
		public function find_studentdetails($student_id){
				global $database;
				$sql = "SELECT student_id,student_fname,student_lname FROM student WHERE student_id = '$student_id'";
				$result_set =  $database->query($sql);
				$found = $database->fetch_array($result_set);
				$this->student_id = $found['student_id'];
				$this->student_fname = $found['student_fname'];
				$this->student_lname = $found['student_lname'];
				$_SESSION['student_fname']=$this->student_fname;
				$_SESSION['student_lname']=$this->student_lname;
				return $found;
			}

		public function stu_full_name() {
				$this->student_fname = $_SESSION['student_fname'];
				$this->student_lname = $_SESSION['student_lname'];

				$stu_full_name=$this->student_fname. " ".$this->student_lname ;
				return $stu_full_name;
			
		}	
		//for retreiving student details for student view pages called in login page

				public function find_by_username($username){
				global $database;
				$sql = "SELECT student_id,student_fname,student_lname,lecturer_id FROM student WHERE username = '$username'";
				$result_set =  $database->query($sql);
				$found = $database->fetch_array($result_set);
				$this->student_id = $found['student_id'];
				$this->student_fname = $found['student_fname'];
				$this->student_lname = $found['student_lname'];
				$_SESSION['student_id']= $found['student_id'];
				$_SESSION['lecturer_id']= $found['student_id'];
				$_SESSION['student_fname']=$this->student_fname;
				$_SESSION['student_lname']=$this->student_lname;
				return $found;
}			
			
}

?>
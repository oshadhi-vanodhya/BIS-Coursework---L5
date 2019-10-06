<?php
require_once("database.php");

class PSession{
	private $session_no;
	private $session_date;
	private $start_time;
	private $end_time;
	private $task_to_do;
	
	
	
	
	
	

	 /***for record session process ***/

        public function record_session($student_id,$session_no,$session_date,$start_time,$end_time,$task_to_do){
      			global $database;
                $sql1="INSERT INTO psession SET session_no='$session_no',session_date='$session_date',start_time='$start_time',end_time='$end_time',task_to_do='$task_to_do'";
				$result = $database->query($sql1);
				return $result;
            
        }
        	//Getters and Setters to be used for the automatic filling process
		
		/*private function set_student_id($student_id){
		 $this-> student_id=$student_id;
		}
		private function get_student_id($student_id){
		 Return $this-> $student_id;
		}*/

		/*public function set_sTime($start_time){		
		date_default_timezone_set("Asia/Kolkata");
		$start_time=date('h:i:sa');
		$this-> start_time=$start_time;
		}*/

		public function get_sTime(){
		date_default_timezone_set("Asia/Kolkata");
		$start_time= date("h:i:sa");
		$this-> start_time=$start_time;
		 Return $this-> start_time;
		}
		public function set_SessionNo($session_no){
		 $this-> session_no=$session_no;
		}
		public function get_SessionNo(){
		$session_no=$this-> session_no;
		 Return $session_no;
		}
		
		public function get_Date(){
		$session_date= date("Y-m-d");
		$this-> session_date=$session_date;

		 Return $this-> session_date;
		}
		public function get_eTime(){
		date_default_timezone_set("Asia/Kolkata");
		$end_time= date("h:i:sa");
		$this-> end_time=$end_time;
		$end_time=$this-> end_time;
		 Return $end_time;
		}
	//validating student id so that only that particular session details could be retreived
	public function check_studentid($student_id,$lecturer_id){
		   global $database;
	    $sql12="SELECT * from student WHERE student_id='$student_id' and lecturer_id= '$lecturer_id'";
		
	    //checking if the student is available in the table
		
	    $result = $database->query($sql12);   
	    $count_row = $result->num_rows;
	    if ($count_row == 1) {
	    
	    return true;
	    }
	    else{
		return false;
	    }
	}
	//constraints- having only 10 sessions for each student
	public function check_sessionno($student_id){
		global $database;
		$sql5 = "SELECT session_no FROM psession_student WHERE student_id = '$student_id'";
	    $result_set =  $database->query($sql5);
		$count_row = $result_set->num_rows;
		if ($count_row < 11) {
		
	    return true;
		}
	    else{
		return false;
	    }
	}
	public function form_session_no($student_id){   
	global $database;
	
	$sql53 = "SELECT MAX(session_no) AS session_no FROM psession_student WHERE student_id = '$student_id'";
    
	$result_set =  $database->query($sql53);
    $lastsession = $database->fetch_array($result_set);
    $session_no= $lastsession['session_no'];
    //extract last 2 digits of the session no and check if its below 11
	$digits= substr( $session_no, -2 );
	if ($digits<11){$session_no=$session_no+1;
	$_SESSION['form_session_no']=$session_no;
	return $newsession;
	;
		}
	else{return " ";}
	}
	/*** for showing the last Session Details ***/
        public function get_session($session_no){
        	global $database;
            $sql3="SELECT * FROM pSession WHERE session_no = '$session_no'";
          	 $result_set =  $database->query($sql3);
				$found = $database->fetch_array($result_set);
				$this->session_no = $found['session_no'];
				$this->session_date = $found['session_date'];
				$this->start_time = $found['start_time'];
				$this->end_date = $found['end_time'];
				$this->task_to_do = $found['task_to_do'];

				return $found;
			}
    public function find_session($student_id){
				global $database;
				$sql = "SELECT MAX(session_no) FROM psession_student WHERE student_id = '$student_id'";
				$result_set =  $database->query($sql);
				$sno = $database->fetch_array($result_set);
				$session_no = $sno['MAX($session_no)'];
				
				return $found;
			}		

	public function find_sessionno($student_id){
				global $database;
				$sql = "SELECT MAX(session_no) as session_no FROM psession_student WHERE student_id = '$student_id'";
				$result_set =  $database->query($sql);
				$sno = $database->fetch_array($result_set);
				$lastsession_no = $sno['session_no'];
				$_SESSION['lastsessionno'] = $lastsession_no;
				return $lastsession_no;
			}		
	
	public static function get_lastsession(){
			$sql53 = "SELECT MAX(session_no) FROM psession_student WHERE student_id = '$student_id'";
			
			$result_set =  $database->query($sql53);
			$sno = $database->fetch_array($result_set);
			$lastsession = $sno['MAX($session_no)'];
			return $lastsession;
			}
			
	public function viewsession(){
			
			$query = "SELECT session_date, start_time, end_time, session_no, task_to_do FROM (psession_student) where session_no='$session_no'";
			$result = $this->database->query($query);    
			$count_row = $result->num_rows;
			if ($count_row > 0) {
				
				
			 echo "<table><tr><th>Session Date</th><th>Start Time</th><th>End Time</th><th>Session no</th><th>Task to do</th></tr>";
			 // output data of each row
			 while($row = $result->fetch_assoc()) {
				 echo "<tr><td>" . $row["session_date"]. "</td><td>" . $row["start_time"]. " " . $row["end_time"]. $row["session_no"]. " " . $row["task_to_do"]. "</td></tr>";
			 }
			 echo "</table>";
					} else {
			 echo "0 results";
				}
	}
	
	
	
	public function all_session($student_id){
		global $database;
		
	    $query = "SELECT psession.session_no, psession.session_date, psession.start_time, psession.end_time, psession.task_to_do, psession_student.session_no FROM psession, psession_student WHERE psession.session_no = psession_student.session_no AND psession_student.student_id = '$student_id' ";
		
	  
		$result = $database->query($query);
		$resultSet = $database->fetch_array_assoc($result);		
		return $resultSet;
	    
	
	}
	
}
	

  ?>
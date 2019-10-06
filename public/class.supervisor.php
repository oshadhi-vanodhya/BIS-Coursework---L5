<?php
require_once ("database.php");

class Lecturer{
	public $lecturer_id;
	public $lecturer_fname;
	public $lecturer_lname;
	
	

		public function check_login($username, $password){
		      global $database;

					  $query="SELECT * from llogin WHERE username='$username' and upass='$password'";

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
		//for the finding the details of the lecturer
		public function find_by_username($username){
				global $database;
				$sql = "SELECT lecturer_id,lecturer_fname,lecturer_lname FROM lecturer WHERE username = '$username'";
				$result_set =  $database->query($sql);
				$found = $database->fetch_array($result_set);
				$this->lecturer_id = $found['lecturer_id'];
				$this->lecturer_fname = $found['lecturer_fname'];
				$this->lecturer_lname = $found['lecturer_lname'];
				$_SESSION['lecturer_id']= $found['lecturer_id'];
				$_SESSION['lecturer_fname']=$this->lecturer_fname;
				$_SESSION['lecturer_lname']=$this->lecturer_lname;
				return $found;
		}	
		public function sup_full_name() {
				$this->lecturer_fname = $_SESSION['lecturer_fname'];
				$this->lecturer_lname=$_SESSION['lecturer_fname'];
				$sup_full_name=$this->lecturer_fname. " ".$this->lecturer_lname ;
				return $sup_full_name;
			
		}		
		
		/*public function find () {
        $result = connection->query('SELECT * FROM users WHERE id = 1');

        $this->id = $result['id'];
        $this->username = $result['username'];
        $this->firstname = $result['firstname'];
        $this->lastname = $result['lastname'];
    }*/
   
 
  	

   
    
}
    

    
	/*public function full_name() {
	  if (isset($this->Comments_fname) && isset($this->lecturer_lname)) {
		  return $this->lecturer_fname . " " . $this->lecturer_lname;
	  } else {
		  return "";
	  }
  }


  public static function find_all(){
    global $database;
    $sql = "SELECT * FROM user";
    $result_set = $database->query($sql);
    return $result_set;
  }
  public static function find_by_id($lecturer_id){
    global $database;
    $sql = "SELECT * FROM user WHERE id = {$lecturer_id}";
    $result_set =  $database->query($sql);
    $found = $database->fetch_array($result_set);
    return $found;
  }   
  public static function find_by_sql($sql=""){
      global $database;
      $result_set =  $database->query($sql);
      return $result_set;
  }*/



?>

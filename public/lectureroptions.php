<?php
session_start();

include_once 'class.PSession.php';
include_once 'class.Supervisee.php';
include_once 'class.Supervisor.php';


$lecturer_id=$_SESSION['lecturer_id'];

$lecturer= new Lecturer();	
$student= new Student();					
$psession = new PSession();

	if (isset($_POST['submit'])) {
    extract($_POST);

    $check_studentid = $psession->check_studentid($student_id,$lecturer_id);
	$check_sessionno = $psession->check_sessionno($student_id);

	//Validating student id and only allowing to proceed if its less than 10 sessions
    if ($check_studentid && $check_sessionno)   {
    
		$_SESSION['student_id']=$_POST['student_id'];


		//$student->find_student($lecturer_id);

    	//get last session number and increment by one
		$psession->form_session_no($student_id);

		$session_no=$_SESSION['session_no'];

		$student->find_studentdetails($student_id);
		
	    header("location:newsession.php");
    } else {
         echo 'Please enter the correct Student ID of your Student';
    }
    }
	
	

?>
<!DOCTYPE html>
<html>
	<head>
    <title>Lectuturer Options Page</title>
        <link rel="stylesheet" href="../public/stylesheets/main1.css">
	</head>

<body bgcolor="#DCDCDC">
	
	<h4><a href="logout.php" button class="button1">Logout  </button></a>
	</h4>
	
	 <header><img src="images/teacher.png" width ="125px" border=5px>Start New Session
		 </header>

	<!--Navigation Bar-->
		<nav>
                 <a href="newsession.php">  New Session  </a>
                
		 </nav>
		
		
	<div id="id01" class="modal">
  
	<form class="modal-content" action="" method="post" name="" >
    

    <div class="container">
      <label><b>Student ID</b></label><br>
      <input type="text"  name="student_id" required=""  >
     <br>
 
      <button class= "button" type="submit" name="submit">
      	Start Session
      </button>
      
    </div>

    
  </form>

  </div>

  </div>
 <div id="footer">
  <?php include('footer.php');?>
</div>

</body>

</html>
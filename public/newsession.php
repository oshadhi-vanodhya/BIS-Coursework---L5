<?php
session_start();
include_once 'class.PSession.php';
include_once 'class.Supervisee.php';
include_once 'class.Supervisor.php';

$student_id=$_SESSION['student_id'];
$session_no= $_SESSION['form_session_no'];
$student_fname=$_SESSION['student_fname'];


$student = new Student();
$lecturer = new Lecturer();
$psession = new PSession();

    
    
    //$psession->get_SessionNo();
    //set time and date
   //$psession->set_sTime($start_time);
   // $psession->set_Date(strtotime("today")); 
     // date("Y-m-d", $dt);

	
	if (isset($_POST['submit'])){
	extract($_POST);
  $psession->get_eTime();
  $psession->get_Date();
	$savesession = $psession->record_session($student_id,$session_no,$session_date,$start_time,$end_time,$task_to_do);
	if ($savesession) {
	// Save Session Successful
	
	header("location:logout.php");
	} else {
	// Save Session Successful
	echo 'Data Not Inserted';
	}
	}

?>
<!DOCTYPE html>
<html>
	<head>
    <title>New Sessions Page</title>
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
		
    <form class="modal-content" action="" method="post" >
    

    <div class="container">
      <label><b>Student ID</b></label><br>
      <input type="text"  name="student_id" required="" disabled value="<?php echo $student_id  ?>" >
     <br>
     <label><b>Student's Full Name</b></label><br>
      <input type="text" name="stu_full_name"  value="<?php echo $student->stu_full_name(); ?>">
      <br>
      <label><b>Supervisor's Full Name</b></label><br>
      <input type="text" name="sup_full_name" value="<?php echo $lecturer->sup_full_name(); ?>" >
      <br>

      <label><b>Session No.</b></label><br>
      <input type="text"  name="session_no" disabled value="<?php echo $session_no; ?>">
      <br>
      <label><b>Date</b></label><br>
      <input type="date" name="session_date" value="<?php echo $psession->get_Date(); ?>"  disabled>
      <br>
      <label><b>Start Time</b></label><br>
      <input type="text"  name="start_time" value="<?php echo $psession->get_sTime(); ?>" >
		           
      <br>      
      <label><b>Comments</b></label><br>
      
      <textarea rows="5" cols="60" name="task_to_do" ></textarea>
        <br>
      <button class= "button" type="submit" name="submit">
      	Save Session
      </button>
      
	  
    </div>

    
  </form>

  </div>
 <div id="footer">
  <?php include('footer.php');?>
</div>

</body>

</html>
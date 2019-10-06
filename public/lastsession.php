<?php
session_start();

include_once 'class.PSession.php';
include_once 'class.Supervisee.php';
include_once 'class.Supervisor.php';

$student_id=$_SESSION['student_id'];
$session_no=$_SESSION['lastsessionno'];

$student=new Student();
$lecturer=new Lecturer();
$psession=new PSession();

$psession->find_sessionno($student_id);
$student->stu_full_name();
$lecturer->sup_full_name();
$psession->set_SessionNo(5602);
$psession->get_session($session_no);
?>
<!DOCTYPE html>
<html>
<head>
  	<title>View Last Session Page</title><h4>
			
<link rel="stylesheet" href="../public/stylesheets/main1.css">


</head>
<body bgcolor="#DCDCDC  ">
	
	<h4><a href="../public/logout.php" button class="button1">Logout  </button></a>
	</h4>
                			
                 <header><img src="images/avatar.png" width ="125px" border=5px>View Last Session
		 </header>

	<!--Navigation Bar-->
		<nav>
                 <a href="lastsession.php">  View Last Session  </a>
                 <a href="viewsessions.php">  View All Sessions  </a>
					<?php $student_id=56?>
		     
				  <label><b>Student ID</b></label>
				  <input type="text"  name="student_id" required="" value="<?php echo $student_id ?>" disabled>
				 
				<label><b>Student's Full Name</b></label>
				  <input type="text" name="stu_FullName" disabled value="<?php echo $stu_full_name ?>">
				  
				  <label><b>Supervisor's Full Name</b></label>
				  <input type="text"name="sup_FullName" disabled value="<?php echo $sup_full_name ?>">

				
				   </nav>
				   <div id="id01" class="modal">
  
  <form class="modal-content" action="" method="post">
    
    <div class="container">
      <br>
      <label><b>Session No.</b></label>      <br>

      <input type="text"  name="session_no" disabled value="<?php echo $psession->get_SessionNo() ?>">
      <br>
      <label><b>Date</b></label><br>

      <input type="text" name="session_date" disabled value="<?php echo $psession->get_Date() ?>">
      <br>
      <label><b>Start Time</b></label>      <br>

      <input type="text"  name="start_time" disabled value="<?php echo $psession->get_sTime() ?>">
      <br>
      <label><b>End Time</b></label>      <br>

      <input type="text" name="end_time" disabled value="<?php echo $psession->get_eTime() ?>">

      <br>
      <label><b>Comments</b></label>      <br>

      <textarea rows="5" cols="28" disabled="" name="task_to_do" value="<?php echo $psession->get_comments()?>"></textarea>
        
      
    </div>

    
  </form>

  </div>
				     
   

	<div id="footer">
  <?php include'footer.php';?>
</div>



</body>
</html>

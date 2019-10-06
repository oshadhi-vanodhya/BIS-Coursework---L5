<?php
session_start();

include_once 'class.PSession.php';
include_once 'class.Supervisee.php';
include_once 'class.Supervisor.php';

$student_id=$_SESSION['student_id'];

		
$student=new Student();
$lecturer=new Lecturer();
$psession=new PSession();

			$psession->get_session();
			
?>
<!DOCTYPE html>
<html>
<head>
  	<title>View All Sessions</title><h4>
			
<link rel="stylesheet" href="../public/stylesheets/main.css">
	<style>
		table, th, td {
			 border: 1px solid black;
		}
</style>

</head>
<body bgcolor="#DCDCDC  ">
	
	
	<h4><a href="../public/logout.php" button class="button1">Logout  </button></a>
	</h4>
                			
                 <header><img src="images/avatar.png" width ="125px" border=5px>View All Seseeions
		 </header>

	<!--Navigation Bar-->
		<nav>
                 <a href="lastsession.php">  View Last Session  </a>
                 <a href="viewsessions.php">  View All Sessions  </a>
			
		     
				<label><b>Student ID</b></label>
				  <input type="text"  name="student_id" required="" value="<?php echo $student_id ?>" disabled>
				 
				<label><b>Student's Full Name</b></label>
				  <input type="text" name="stu_full_name" value ="<?php echo $student->stu_full_name() ?>" disabled>
				  
				  <label><b>Supervisor's Full Name</b></label>
				  <input type="text"name="sup_full_name" value ="<?php echo $lecturer->sup_full_name() ?>" disabled>


       </nav>

	<?php
   $psession = new PSession();
		//get last session
		$psession->viewsession();
	$student = new Student();
			//student->find_by_username($username);
	?>
	

	<div id="footer">
  <?php include'footer.php';?>
</div>



</body>
</html>

<?php
session_start();
include_once 'class.PSession.php';
include_once 'class.Supervisee.php';
include_once 'class.Supervisor.php';

		$username=$_SESSION['username'];
		$student_id=$_SESSION['student_id'];
		$lecturer_id=$_SESSION['lecturer_id'];


$student=new Student();
$lecturer= new Lecturer();	
$psession = new PSession();

	

if (isset($_POST['submit'])) {
    extract($_POST);

	
	$all_session = $psession->all_session($student_id);
	
	/*echo '<pre>';
	print_r($all_session);
	echo '</pre>';*/
}

if (isset($_POST['lastsession'])) {
    extract($_POST);

	
	$all_session = $psession->all_session($student_id);
	
	/*echo '<pre>';
	print_r($all_session);
	echo '</pre>';*/
}
	


?>
<!DOCTYPE html>
<html>
	<head>
    <title>Student Options Page</title>
          <link rel="stylesheet" href="../public/stylesheets/main.css">

	</head>

<body bgcolor="#DCDCDC">

	<h4><a href="../public/logout.php" button class="button1">Logout  </button></a>
	</h4>
                			
                 <header><img src="images/avatar.png" width ="125px" border=5px>Student Options Page
		 </header>

	<!--Navigation Bar-->
		<nav>
				<label><b>Student ID</b></label>
				  <input type="text"  name="student_id" required="" value="<?php echo $student_id ?>" disabled>
				 
				<label><b>Student's Full Name</b></label>
				  <input type="text" name="stu_full_name" value ="<?php echo $student->stu_full_name() ?>" disabled>
				  
				  <label><b>Supervisor's Full Name</b></label>
				  <input type="text"name="sup_full_name" value ="<?php echo $lecturer->sup_full_name() ?>" disabled>
              <form class="" action="" method="post">
				 <input type="text" style="display: none;" name="student_id" value="<?php echo $student_id ?>">
				<input type="submit"  name="lastsession" value="View last session"  type="submit" >
				 </form>
               
				 
				 <form class="" action="" method="post">
				 <input type="text" style="display: none;" name="student_id" value="<?php echo $student_id ?>">
				<input type="submit"  name="submit" value="View all session"  type="submit" >
				 </form>

				
	
		     	</nav>
              
				
				
			
  <div><?php 
				   foreach($all_session as $key => $value)
{
   echo ' ' . $key . '';
   echo ' ' . $value.'<br>';
} ?>
				   </div>
			
		     

       </nav>

</body>

</html>
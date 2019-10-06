<?php
session_start();

include_once 'class.PSession.php';
include_once 'class.Supervisee.php';
include_once 'class.Supervisor.php';

$student = new Student();
		
    	
	if (isset($_POST['submit'])) {
    extract($_POST);
    $login = $student->check_login($username, $password);
    if ($login)  {
    // Login Success
		    $student->find_by_username($username);
    
	
	
    header("location:studentoptions.php");
    } else{
            
    echo 'Wrong username or password';
    }
    }
	 	
		
?>
<!DOCTYPE html>

<html>
    <head>
        <title> Login </title>
        <link rel="stylesheet" href="../public/stylesheets/login1.css">


    </head>
<body>

    <script type="text/javascript" src= '../public/javascript/login1.js' language="javascript">

    </script>

 
<div id="id01" class="modal">
  
  <form class="modal-content" action="" method="post" name="login">
    <div class="imgcontainer">
      
      <img src="images/Student.png" class="avatar">
      <h2> Student Login</h2>
    </div>

		<div class="container">
		  <label><b>Username</b></label><br>
		  <input type="text" placeholder="Enter Username" name="username" required>
			
		  <label><b>Password</b></label><br>
		  <input type="password" placeholder="Enter Password" name="password" required>
	  
		  <button onclick="return(submitlogin());" type="submit" name="submit" value="submit">
			Login
		  </button>
		  <input type="checkbox" checked="checked"> Remember me
		</div>

  </form>

</div>

<div id="footer">
  <?php include'footer.php';?>
</div>

</body>
</html>
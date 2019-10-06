<?php
  
session_start();
include_once 'class.Supervisor.php';


$lecturer = new Lecturer();

   if (isset($_POST['submit'])) {
    extract($_POST);
    $login = $lecturer->check_login($username, $password);
   	   
    if ($login)  {
    // Login Successful		
    		$lecturer->find_by_username($username);

			
	    header("location:lectureroptions.php");

    } else {
     
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
    
    <script type="text/javascript" src= '../public/javascript/login2.js' language="javascript">
    </script>

<div id="id01" class="modal">
  
  <form class="modal-content" action="" method="post" name="login">
    <div class="imgcontainer">      
		  <img src="images/Student.png" class="avatar">
		  <h2> Lecturer Login</h2>
    </div>

    <div class="container">
		  <label><b>Username</b></label><br>
		  <input type="text" placeholder="Enter Username" name="username" required>
			
		  <label><b>Password</b></label><br>
		  <input type="password" placeholder="Enter Password" name="password" required>

				  
		  <button onclick="return(submitlogin1());" type="submit" name="submit" value="Login">
			Login
		  </button>
		  <input type="checkbox" checked="checked"> Remember me
    </div>

    
  </form>

</div>

<?php

?>
	<div id="footer">
	  <?php include'footer.php';?>
	</div>

</body>
</html>
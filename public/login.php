<?php
	session_start();
include_once 'class.user.php';
$user = new User();


if (isset($_REQUEST['submit'])) {
extract($_REQUEST);
$login = $user->check_login($emailusername, $password);
if ($login) {
// Registration Success
header("location:home.php");
} else {
// Registration Failed
echo 'Wrong username or password';
}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="../public/stylesheets/login.css">
	</head>

<body>
    <script type="text/javascript" language="javascript">

    	function submitlogin() {
    	var form = document.login;
    	if(form.emailusername.value == ""){
    	alert( "Enter email or username." );
    	return false;
    	}
    	else if(form.password.value == ""){
    	alert( "Enter password." );
    	return false;
    	}
    	}

    </script>

     <?php
       $mylink = $_SERVER['REQUEST_URI'];
      $type = explode('=',$mylink);
      $type = end($type);
         
     ?>
<h1>Welcome to University of Westminster!</h1>
  
<div id="id01" class="modal">
  
  <form class="modal-content" action="" method="post" name="login">
    <div class="imgcontainer">
     
      <img src="images/<?php echo $type ?>.png" alt="Avatar" class="avatar">
      <h2><?php echo $type?></h2>
    </div>

    <div class="container">
      <label><b>Username</b></label><br>
      <input type="text" placeholder="Enter Username" name="username" required="">
        
      <label><b>Password</b></label><br>
      <input type="password" placeholder="Enter Password" name="password" required="">
        
      <button onclick="return(submitlogin());" type="submit" name="submit">
      	Login
      </button>
      <input type="checkbox" checked="checked"> Remember me
    </div>

    
  </form>

  </div>
</body>

</html>

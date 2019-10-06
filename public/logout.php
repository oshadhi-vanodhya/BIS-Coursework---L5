<?php
//remove all sessions
session_unset();
//destroy session
session_destroy();
$_SESSION['login'] = FALSE;
header("Location: homeMain.php");
?>
<?php 
session_start();

$_SESSION['username']="Login";
$_SESSION['firstname']=null;
$_SESSION['lastname']=null;
$_SESSION['user_role']=null;
 $_SESSION['msg']=null;
 $_SESSION['msg1']=null;
header("Location:../login.php");


?>
   

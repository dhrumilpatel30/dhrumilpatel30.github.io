<?php   
session_start();
$uname = base64_decode(urldecode($_GET["uname"]));
if (isset($_SESSION[$uname])) {
   session_destroy(); 
   header("location:login.php?msg='You have successfully logged out'");
}
else{
   header("location:login.php?msg='Your session is expired log in again'");
}
?>
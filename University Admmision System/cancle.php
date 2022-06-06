<?php
session_start();
require "config.php";
$uname = base64_decode(urldecode($_GET["uname"]));
if (isset($_SESSION[$uname])) {
$sql = "SELECT * FROM `applicatiions` WHERE application_number='" . $_GET['appl_num'] . "'";
$result1 = mysqli_query($link, $sql);
$result = mysqli_fetch_array($result1);
$course = $result['course'];
        $sql = "DELETE * FROM `approved_req` WHERE application_number='".$result['application_number']."'";
        if (mysqli_query($link,$sql))
        {
         $sql ="UPDATE `courses` SET `filled_seat`=filled_seat-1 WHERE course='".$course."'";
         mysqli_query($link,$sql);
         $msg = "successfully cancled..";
         $param = urlencode(base64_encode($uname));
         header("Location:adminhome.php?uname=$param&msg=$msg");
        }
        else{
         $msg = "something went wrong try again..";
         $param = urlencode(base64_encode($uname));
         header("Location:adminhome.php?uname=$param&msg=$msg");
        }
}

?>

<?php
session_start();
require "config.php";
$uname = base64_decode(urldecode($_GET["uname"]));
date_default_timezone_set("Asia/Calcutta");
$date1 = date("h:i:sa d/M/Y");
if (isset($_SESSION[$uname])) {
$sql = "SELECT * FROM `applicatiions` WHERE application_number='" . $_GET['appl_num'] . "'";
$result1 = mysqli_query($link, $sql);
$result = mysqli_fetch_array($result1);
$course = $result['course'];
        $sql = "INSERT INTO `rejected_req`(`course`, `application_number`, `time`, `student_id`) VALUES ('".$result['course']."','".$result['application_number']."','".$date1."','".$result['student_id']."')";
        if (mysqli_query($link,$sql))
        {
         $sql ="UPDATE `courses` SET `requests`=requests-1, `rejected`= rejected+1 WHERE course='".$course."'";
         mysqli_query($link,$sql);
         $msg = "successfully rejected..";
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

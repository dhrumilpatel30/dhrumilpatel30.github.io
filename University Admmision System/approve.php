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
$sql = "SELECT * FROM `courses` WHERE course='" . $course . "'";
$result1 = mysqli_query($link, $sql);
$result2 = mysqli_fetch_array($result1);
if ($result2['filled seats'] == 150)
{
    $msg = "seats for this course is already full..";
    $param = urlencode(base64_encode($uname));
    header("Location:adminhome.php?uname=$param&msg=$msg"); 
}
else
{
        $sql = "INSERT INTO `approved_req`(`course`, `application_number`, `time`, `student_id`) VALUES ('".$result['course']."','".$result['application_number']."','".$date1."','".$result['student_id']."')";
        if (mysqli_query($link,$sql))
        {
         $sql = "DELETE * FROM `applicatiions` WHERE student_id='".$result['student_id']."'";
         $sql ="UPDATE `courses` SET `filled_seat`= filled_seat+1 ,`requests`= requests-1 WHERE course='".$course."'";
         mysqli_query($link,$sql);
         $msg = "successfully approved..";
         $param = urlencode(base64_encode($uname));
         header("Location:adminhome.php?uname=$param&msg=$msg");
        }
        else{
         $msg = "something went wrong try again..";
         $param = urlencode(base64_encode($uname));
         header("Location:adminhome.php?uname=$param&msg=$msg");
        }
    }
}
else {
   header("Location:admin.php?msg=seesion is timed out login again");
}
?>

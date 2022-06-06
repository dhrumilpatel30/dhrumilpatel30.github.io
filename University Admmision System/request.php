<?php
session_start();
require "config.php";
date_default_timezone_set("Asia/Calcutta");
$date1 = date("h:i:sa d/M/Y");
$uname = base64_decode(urldecode($_GET["uname"]));
$course = $_GET["msg"];
if (isset($_SESSION[$uname])) {
    $sql = "SELECT `student_id` FROM `student_info` WHERE email='" . $uname . "'";
    $result1 = mysqli_query($link, $sql);
    $result = mysqli_fetch_array($result1);
    $s_id = $result['student_id'];
    $sql = "INSERT INTO `applicatiions`(`course`, `time`, `student_id`) VALUES (?,?,?)";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssi", $param1, $param2, $param3);
        $param1 = $course;
        $param2 = $date1;
        $param3 = $s_id;
        if (mysqli_stmt_execute($stmt)) {
            $sql = "UPDATE `courses` SET requests=requests+1 WHERE course='" . $course . "'";
            mysqli_query($link, $sql);
            $param = urlencode(base64_encode($uname));
            header("Location:home.php?uname=$param&msg=Successfully applied for course");
        }
        else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    else {
        echo "Oops! Something went wrong. Please try again later.";

    }
}
else {
    header("Location:login.php?msg='Your seesion has been timed out'");
}

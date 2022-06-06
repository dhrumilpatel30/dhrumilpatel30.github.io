<h2><br>APPLY NOW</h2>
<?php

$sql = "SELECT `student_id` FROM `student_info` WHERE email='" . $uname . "'";
$result1 = mysqli_query($link, $sql);
$result = mysqli_fetch_array($result1);
$s_id = $result['student_id'];
$sql = "SELECT * FROM `approved_req` WHERE student_id='" . $s_id . "'";
$result1 = mysqli_query($link, $sql);
if (mysqli_num_rows($result1) > 0)
{
    $result = mysqli_fetch_array($result1);
    echo "you have approved for addmission<br>your course is:-";
    echo $result['course'];
    echo "on date and time:-";
    echo $result['time'];
    echo "contact our college administration for further
   inqiuriy<br>your approved application number is";
    echo $result['application_number'];
    echo "<br>";
    echo "our office contanct number:-999999999" . "<br>";
    echo "if you do not want your addmission";
    ?><a href="cancle.php?uname=<?php echo $param; ?>&appl_num=<?php echo $result['application_number']; ?>>CANCEL NOW</a><?php  
}
else
{
    echo "Computer Enginnering";
    $sql = "SELECT course FROM rejected_req INNER JOIN student_info USING (student_id) WHERE email='" . $uname . "' AND course='CE'";
    $result1 = mysqli_query($link, $sql);
    if (mysqli_num_rows($result1) > 0)
    {
        echo "You have been rejected for this course by admin";
    }
    else
    {
        $sql = "SELECT course FROM applicatiions INNER JOIN student_info USING (student_id) WHERE email='" . $uname . "' AND course='CE'";
        $result1 = mysqli_query($link, $sql);
        if (mysqli_num_rows($result1) > 0)
        {
            echo " You have already applied for this course wait for admin responce<br>";
        }
        else
        {
            $seats = "SELECT `filled_seat`FROM `courses` WHERE course='CE'";
            if (150 != $seats)
            {
               ?><a href="request.php?msg=CE&uname=<?php echo $param; ?>"> Apply now!!</a><br> <?php
            }
            else
            {
                echo "No seats available for this course🙁🤕";
            }
        }
    }
    echo "Information Technology";
    $sql = "SELECT course FROM rejected_req INNER JOIN student_info USING (student_id) WHERE email='" . $uname . "' AND course='IT'";
    $result1 = mysqli_query($link, $sql);
    if (mysqli_num_rows($result1) > 0)
    {
        echo "You have been rejected for this course by admin";
    }
    else
    {
        $sql = "SELECT course FROM applicatiions INNER JOIN student_info USING (student_id) WHERE email='" . $uname . "' AND course='IT'";
        $result1 = mysqli_query($link, $sql);
        if (mysqli_num_rows($result1) > 0)
        {
            echo "You have already applied for this course wait for admin responce<br>";
        }
        else
        {
            $seats = "SELECT `filled_seat`FROM `courses` WHERE course='IT'";
            if (150 != $seats)
            {
               ?><a href="request.php?msg=IT&uname=<?php echo $param; ?>"> Apply now!!</a> <br><?php
            }
            else
            {
                echo "No seats available for this course🙁🤕";
            }
        }
    }

    echo "Mechanical Engineering";
    $sql = "SELECT course FROM rejected_req INNER JOIN student_info USING (student_id) WHERE email='" . $uname . "' AND course='MH'";
    $result1 = mysqli_query($link, $sql);
    if (mysqli_num_rows($result1) > 0)
    {
        echo "You have been rejected for this course by admin";
    }
    else
    {
        $sql = "SELECT course FROM applicatiions INNER JOIN student_info USING (student_id) WHERE email='" . $uname . "' AND course='MH'";
        $result1 = mysqli_query($link, $sql);
        if (mysqli_num_rows($result1) > 0)
        {
            echo "You have already applied for this course wait for admin responce<br>";
        }
        else
        {
            $seats = "SELECT `filled_seat`FROM `courses` WHERE course='MH'";
            if (150 != $seats)
            {
               ?><a href="request.php?msg=MH&uname=<?php echo $param; ?>"> Apply now!!</a> <br><?php
            }
            else
            {
                echo "No seats available for this course🙁🤕";
            }
        }
    }
    echo "Chemical Enginnering";
    $sql = "SELECT course FROM rejected_req INNER JOIN student_info USING (student_id) WHERE email='" . $uname . "' AND course='CH'";
    $result1 = mysqli_query($link, $sql);
    if (mysqli_num_rows($result1) > 0)
    {
        echo "You have been rejected for this course by admin";
    }
    else
    {
        $sql = "SELECT course FROM applicatiions INNER JOIN student_info USING (student_id) WHERE email='" . $uname . "' AND course='CH'";
        $result1 = mysqli_query($link, $sql);
        if (mysqli_num_rows($result1) > 0)
        {
            echo "You have already applied for this course wait for admin responce<br>";
        }
        else
        {
            $seats = "SELECT `filled_seat`FROM `courses` WHERE course='CH'";
            if (150 != $seats)
            {
               ?><a href="request.php?msg=CH&uname=<?php echo $param; ?>"> Apply now!!</a> <br><?php
            }
            else
            {
                echo "No seats available for this course🙁🤕";
            }
        }
    }
}
?>
<br>

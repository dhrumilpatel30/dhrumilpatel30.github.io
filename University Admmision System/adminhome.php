<?php
session_start();
require "config.php";
$uname = base64_decode(urldecode($_GET["uname"]));
if (isset($_GET['msg'])) {
   echo '<script>alert("';
   echo $_GET['msg'];
   echo '")</script>';
}
if (isset($_SESSION[$uname])) {
   echo "Welcome, Admin <br/>";
   $param = urlencode(base64_encode($uname));
   ?><h2><br>details of courses</h2><?php
   echo '<table>';
    echo "<thead>";
    echo "<tr>";
    echo "<th>Course</th>";
    echo "<th>total seats</th>";
    echo "<th>filled seats</th>";
    echo "<th>available seats</th>";
    echo "<th>requests for seat</th>";
    echo "<th>rejected seats</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
   $sql = "SELECT * FROM `courses`";
        if ($result = mysqli_query($link, $sql)) {
           while( $row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['course'] . "</td>";
            echo "<td>" . $row['total seats'] . "</td>";
            echo "<td>" . $row['filled_seat'] . "</td>";
            echo "<td>" . $row['total seats'] - $row['filled_seat'] . "</td>";
            echo "<td>" . $row['requests'] . "</td>";
            echo "<td>" . $row['rejected'] . "</td>";
            echo "</tr>";
           }
            echo "</tbody>";
            echo "</table>";
            ?><h2><br>Applications Pending..</h2><?php
            echo '<table>';
    echo "<thead>";
    echo "<tr>";
    echo "<th>Course</th>";
    echo "<th>name</th>";
    echo "<th>gujcet marks</th>";
    echo "<th>student id</th>";
    echo "<th>time and date</th>";
    echo "<th>board roll number</th>";
    echo "<th>gujcet roll number</th>";
    echo "<th>application number</th>";
    echo "<th>approve</th>";
    echo "<th>reject</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
   $sql = "SELECT * FROM applicatiions INNER JOIN student_info USING (student_id) ORDER BY `applicatiions`.`course` ASC";
        if ($result = mysqli_query($link, $sql)) {
           while( $row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['course'] . "</td>";
            echo "<td>" . $row['fname'] . "</td>";
            echo "<td>" . $row['gujcettotal'] . "</td>";
            echo "<td>" . $row['student_id'] ."</td>";
            echo "<td>" . $row['time'] . "</td>";
            echo "<td>" . $row['boardro'] . "</td>";
            echo "<td>" . $row['gujcetro'] . "</td>";
            echo "<td>" . $row['application_number'] . "</td>";
            ?> <td><a href="approve.php?uname=<?php echo $param; echo "&appl_num="; echo $row['application_number']; ?> ">approve</a></td><?php
            ?> <td><a href="reject.php?uname=<?php echo $param; echo "&appl_num="; echo $row['application_number']; ?> ">reject</a></td><?php
            echo "</tr>";
           }
            echo "</tbody>";
            echo "</table>"; 
            ?><h2><br>Applications Approved..</h2><?php
            echo '<table>';
    echo "<thead>";
    echo "<tr>";
    echo "<th>Course</th>";
    echo "<th>name</th>";
    echo "<th>gujcet marks</th>";
    echo "<th>student id</th>";
    echo "<th>time and date</th>";
    echo "<th>board roll number</th>";
    echo "<th>gujcet roll number</th>";
    echo "<th>application number</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
   $sql = "SELECT * FROM approved_req INNER JOIN student_info USING (student_id) ORDER BY `approved_req`.`course` ASC";
        if ($result = mysqli_query($link, $sql)) {
           while( $row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['course'] . "</td>";
            echo "<td>" . $row['fname'] . "</td>";
            echo "<td>" . $row['gujcettotal'] . "</td>";
            echo "<td>" . $row['student_id'] ."</td>";
            echo "<td>" . $row['time'] . "</td>";
            echo "<td>" . $row['boardro'] . "</td>";
            echo "<td>" . $row['gujcetro'] . "</td>";
            echo "<td>" . $row['application_number'] . "</td>";
            echo "</tr>";
           }
            echo "</tbody>";
            echo "</table>";
         }
         ?><h2><br>Applications rejected..</h2><?php
            echo '<table>';
    echo "<thead>";
    echo "<tr>";
    echo "<th>Course</th>";
    echo "<th>name</th>";
    echo "<th>gujcet marks</th>";
    echo "<th>student id</th>";
    echo "<th>time and date</th>";
    echo "<th>board roll number</th>";
    echo "<th>gujcet roll number</th>";
    echo "<th>application number</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
   $sql = "SELECT * FROM rejected_req INNER JOIN student_info USING (student_id) ORDER BY `rejected_req`.`course` ASC";
        if ($result = mysqli_query($link, $sql)) {
           while( $row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['course'] . "</td>";
            echo "<td>" . $row['fname'] . "</td>";
            echo "<td>" . $row['gujcettotal'] . "</td>";
            echo "<td>" . $row['student_id'] ."</td>";
            echo "<td>" . $row['time'] . "</td>";
            echo "<td>" . $row['boardro'] . "</td>";
            echo "<td>" . $row['gujcetro'] . "</td>";
            echo "<td>" . $row['application_number'] . "</td>";
            echo "</tr>";
           }
            echo "</tbody>";
            echo "</table>";
         }
        }
      }
}
else {
    header("Location:admin.php?msg='Your seesion has been timed out'");
}
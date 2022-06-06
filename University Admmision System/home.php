<?php
session_start();
require "config.php";
$uname = base64_decode(urldecode($_GET["uname"]));
$parts = explode("@", $uname);
$uname1 = $parts[0];
if (isset($_GET['msg'])) {
    echo '<script>alert("';
    echo $_GET['msg'];
    echo '")</script>';
}
if (isset($_SESSION[$uname])) {
    echo "Welcome, {$_SESSION[$uname]}. <br/>";
    $param = urlencode(base64_encode($uname));

    $uname_computer_engineering = $uname1 . '_CE';
    $uname_information_technology = $uname1 . '_IT';
    $uname_mechanical_engineering = $uname1 . '_MH';
    $uname_chemical_engineering = $uname1 . '_CH';

    echo "you can change your branch interests here:--";
?><br>
   <a href="profile.php?uname= <?php echo $param; ?>">PROFILE</a>
   <h2>Details of course seats as per your interests<br></h2>
   <?php
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
    if (isset($_COOKIE["$uname_computer_engineering"])) {
        $sql = "SELECT * FROM `courses` WHERE course='CE'";
        if ($result1 = mysqli_query($link, $sql)) {
            $result = mysqli_fetch_array($result1);
            echo "<tr>";
            echo "<td>" . $result['course'] . "</td>";
            echo "<td>" . $result['total seats'] . "</td>";
            echo "<td>" . $result['filled_seat'] . "</td>";
            echo "<td>" . $result['total seats'] - $result['filled_seat'] . "</td>";
            echo "<td>" . $result['requests'] . "</td>";
            echo "<td>" . $result['rejected'] . "</td>";
            echo "</tr>";
            mysqli_free_result($result1);
        }
        else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    if (isset($_COOKIE["$uname_information_technology"])) {
        $sql = "SELECT * FROM `courses` WHERE course='IT'";
        if ($result1 = mysqli_query($link, $sql)) {
            $result = mysqli_fetch_array($result1);
            echo "<tr>";
            echo "<td>" . $result['course'] . "</td>";
            echo "<td>" . $result['total seats'] . "</td>";
            echo "<td>" . $result['filled_seat'] . "</td>";
            echo "<td>" . $result['total seats'] - $result['filled_seat'] . "</td>";
            echo "<td>" . $result['requests'] . "</td>";
            echo "<td>" . $result['rejected'] . "</td>";
            echo "</tr>";
            mysqli_free_result($result1);
        }
        else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    if (isset($_COOKIE["$uname_mechanical_engineering"])) {
        $sql = "SELECT * FROM `courses` WHERE course='MH'";
        if ($result1 = mysqli_query($link, $sql)) {
            $result = mysqli_fetch_array($result1);
            echo "<tr>";
            echo "<td>" . $result['course'] . "</td>";
            echo "<td>" . $result['total seats'] . "</td>";
            echo "<td>" . $result['filled_seat'] . "</td>";
            echo "<td>" . $result['total seats'] - $result['filled_seat'] . "</td>";
            echo "<td>" . $result['requests'] . "</td>";
            echo "<td>" . $result['rejected'] . "</td>";
            echo "</tr>";
            mysqli_free_result($result1);
        }
        else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    if (isset($_COOKIE["$uname_chemical_engineering"])) {
        $sql = "SELECT * FROM `courses` WHERE course='CH'";
        if ($result1 = mysqli_query($link, $sql)) {
            $result = mysqli_fetch_array($result1);
            echo "<tr>";
            echo "<td>" . $result['course'] . "</td>";
            echo "<td>" . $result['total seats'] . "</td>";
            echo "<td>" . $result['filled_seat'] . "</td>";
            echo "<td>" . $result['total seats'] - $result['filled_seat'] . "</td>";
            echo "<td>" . $result['requests'] . "</td>";
            echo "<td>" . $result['rejected'] . "</td>";
            echo "</tr>";
            mysqli_free_result($result1);
        }
        else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
}
else {
    header("Location:login.php?msg='Your seesion has been timed out'");
}
echo "</tbody>";
echo "</table>";

include "apply.php";

echo "You can <a href='logout.php?uname=$param'>logout</a> here. <br/>";


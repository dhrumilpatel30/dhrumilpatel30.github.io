<?php
include "config.php";
const NAME_REQUIRED = 'Please enter your name';
const EMAIL_REQUIRED = 'Please enter your email';
const EMAIL_INVALID = 'Please enter a valid email';
const GMA_REQUIRED = 'Please enter your marks';
const GMA_INVALID = 'Please enter a valid marks';
const PWD_REQUIRED = 'Please enter password';
const PWD_INVALID = "password NOT maching';
const GRO_REQUIRED = 'Please enter your roll number';
const GRO_INVALID = 'Please enter a valid roll number';
if($_SERVER['REQUEST_METHOD'] == "POST"){
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$inputs['name'] = $name;
if ($name) {
    $name = trim($name);
    if ($name === '') {
        $errors['name'] = NAME_REQUIRED;
    }
} else {
    $errors['name'] = NAME_REQUIRED;
}
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$inputs['email'] = $email;
if ($email) {
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if ($email === false) {
        $errors['email'] = EMAIL_INVALID;
    }
} else {
    $errors['email'] = EMAIL_REQUIRED;
}

$boardro = $_POST['boardro'];
$inputs['boardro'] = $boardro;
if ($boardro) {
    // validate boardro
    $boardro = filter_var($boardro, FILTER_VALIDATE_INT);
    if ($boardro === false) {
        $errors['boardro'] = GRO_INVALID;
    }
} else {
    $errors['boardro'] = GRO_REQUIRED;
}
$gujcetro = $_POST['gujcetro'];
$inputs['gujcetro'] = $gujcetro;
if ($gujcetro) {
    $gujcetro = filter_var($gujcetro, FILTER_VALIDATE_INT);
    if ($gujcetro === false) {
        $errors['gujcetro'] = GRO_INVALID;
    }
} else {
    $errors['gujcetro'] = GRO_REQUIRED;
}
$gujcettotal = $_POST['gujcettotal'];
$inputs['gujcettotal'] = $gujcettotal;
if ($gujcettotal) {
    $gujcettotal = filter_var($gujcettotal, FILTER_VALIDATE_INT);
    if ($gujcettotal === false) {
        $errors['gujcettotal'] = GMA_INVALID;
    }
} else {
    $errors['gujcettotal'] = GMA_REQUIRED;
}

$password = $_POST['password'];
if ($password) {
   $password1 = $_POST['password1'];
if ($password1) {
    if ($password1 != $password) {
        $errors['password1'] = PWD_INVALID;
    }
} else {
    $errors['password1'] = PWD_REQUIRED;
}
} else {
    $errors['password'] = PWD_REQUIRED;
}
if(count($errors) === 0){

    $sql = "INSERT INTO `student_info`(`fname`, `email`, `gujcetro`, `boardro`, `password`, `gujcettotal`) VALUES (?,?,?,?,?,?)";

    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssiisi", $param_name, $par1, $par2, $par3, $par4, $par5);
        $param_name = $name;
        $par1=$email;
        $par2=$gujcetro;
        $par3=$boardro;
        $par4=$password;
        $par5=$gujcettotal;
        if (mysqli_stmt_execute($stmt)) {
           //setting all the interests cookies by defualt which user can change in profile
$parts = explode("@", $email);
$uname1=$parts[0];
$uname_computer_engineering=$uname1.'_CE';
$uname_information_technology=$uname1.'_IT';
$uname_mechanical_engineering=$uname1.'_MH';
$uname_chemical_engineering=$uname1.'_CH';
$yes="yes";
setcookie("$uname_computer_engineering",$yes,time()+3600*4);
setcookie("$uname_information_technology",$yes,time()+3600*4);
setcookie("$uname_mechanical_engineering",$yes,time()+3600*4);
setcookie("$uname_chemical_engineering",$yes,time()+3600*4);
            header("location: index.php?msg=signup successfull");
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
   }
}
?>

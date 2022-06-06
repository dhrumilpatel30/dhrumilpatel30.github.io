<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscribe</title>
</head>
<body>
    <main>
<?php
if(isset($_GET['message'])){
if($_GET['message'] == "signup"){
   header("location:signup.php");
}
}
else{
   require('login.php');
}
?>
</main>
</body>
</html>

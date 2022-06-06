<form action=<?php echo $_SERVER['PHP_SELF']; ?> method="post">
<label for="email">Enter your email:</label>
<input type="text" id="email" name="email"/>
<label for="pwd">Password:</label>
<input type="password" id="pwd" name="pwd"/>
<input type="submit" value="Login"/>
<input type="reset" value="Clear"/>
<input type="submit" value="signup" id="signup" name="signup"/> 
<a href="admin.php">Login as admin</a>
</form>

<br>
<br>


<?php
require('config.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
   if (!empty($_POST["email"]) and !empty($_POST["pwd"]) and isset($_POST["email"]) and isset($_POST["pwd"])) {
        $email = $_POST["email"];
        $password = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_STRING);
        $sql = mysqli_query($link,"SELECT * FROM `student_info` WHERE email='".$email."' AND password='".$password."' ");
    $num = mysqli_num_rows($sql);  
    if($num > 0) {
      session_start();
      $_SESSION[$email] = $email;
      $param = urlencode(base64_encode($email));
      header("Location:home.php?uname=$param");
    } 
    else {
       echo "<h1>Incorrect username and/or password. Please retry.</h1>";
      }
   }else {
      echo "<h1>Please enter username and password.</h1>";
   }
   if (isset($_POST['signup'])){
      header("Location:index.php?message=signup");
   }
}
?>

<?php
if (isset($_GET['msg'])) {
    echo "<h1>{$_GET['msg']}</h1>";
}
?>
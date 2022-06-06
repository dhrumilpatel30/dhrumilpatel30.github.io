

<form action=<?php echo $_SERVER['PHP_SELF']; ?> method="post">
<label for="email">Enter your email:</label>
<input type="email" id="email" name="email"/>
<label for="pwd">Password:</label>
<input type="password" id="pwd" name="pwd"/>
<input type="submit" value="Login"/>
<input type="reset" value="Clear"/>
</form>

<?php


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST["email"]) and !empty($_POST["pwd"]) and isset($_POST["email"]) and isset($_POST["pwd"])) {
        $uname = $_POST["email"];
        $password = $_POST["pwd"];
        if ($uname == "admin@mail.com" and $password == "admin121") {
            session_start();
            $_SESSION[$uname] = $uname;
            $param = urlencode(base64_encode($uname));
            header("Location:adminhome.php?uname=$param");
        } else {
            echo "<h1>Incorrect username and/or password. Please retry.</h1>";
        }
    } else {
        echo "<h1>Please enter username and password.</h1>";
    }
}
?>

<?php
if (isset($_GET['msg'])) {
    echo "<h1>{$_GET['msg']}</h1>";
}
?>
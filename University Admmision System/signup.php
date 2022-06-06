<?php 
$errors = [];
$inputs = [];
include "validation.php";
?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <header>
        <h1>Details</h1>
        <p>Give us your honest details to server you better!</p>
    </header>
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" placeholder="Full Name" value="<?php echo $inputs['name'] ?? '' ?>">
        <small><?php echo $errors['name'] ?? '' ?></small>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" placeholder="Email Address" value="<?php echo $inputs['email'] ?? '' ?>">
        <small><?php echo $errors['email'] ?? '' ?></small>
    </div>
    <div>
        <label for="boardro">board roll number:</label>
        <input type="text" name="boardro" id="boardro" placeholder="Your correct board roll number" value="<?php echo $inputs['boardro'] ?? '' ?>">
        <small><?php echo $errors['boardro'] ?? '' ?></small>
    </div>
    <div>
        <label for="gujcetro">gujcet roll number:</label>
        <input type="text" name="gujcetro" id="gujcetro" placeholder="Your correct gujcet roll number" value="<?php echo $inputs['gujcetro'] ?? '' ?>">
        <small><?php echo $errors['gujcetro'] ?? '' ?></small>
    </div>
    <div>
        <label for="gujcettotal">gujcet Total marks:</label>
        <input type="text" name="gujcettotal" id="gujcettotal" placeholder="Your gujcet total marks" value="<?php echo $inputs['gujcettotal'] ?? '' ?>">
        <small><?php echo $errors['gujcettotal'] ?? '' ?></small>
    </div>
    <div>
        <label for="password">password:</label>
        <input type="password" name="password" id="password" placeholder="Your password">
        <small><?php echo $errors['password'] ?? '' ?></small>
    </div>
    <div>
        <label for="password1">Confirm password:</label>
        <input type="password" name="password1" id="password1" placeholder="Your password">
        <small><?php echo $errors['password1'] ?? '' ?></small>
    </div>
    <button type="submit">Registration</button>
</form>

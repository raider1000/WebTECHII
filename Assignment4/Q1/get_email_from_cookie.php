<?php
if(isset($_POST['username'])) {
    $inputName = $_POST['username'];

    if(isset($_COOKIE['user_data'])) {
        list($name, $roll, $email) = explode("|", $_COOKIE['user_data']);
        
        if(strtolower($name) === strtolower($inputName)) {
            echo "Welcome $name! Your email is: $email";
        } else {
            echo "Username doesn't match cookie.";
        }
    } else {
        echo "No cookie found.";
    }
}
?>

<form method="POST">
  Enter your name: <input type="text" name="username" required />
  <input type="submit" value="Check Email" />
</form>

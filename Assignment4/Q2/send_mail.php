<?php
if(isset($_POST['send'])) {
    $to = $_POST['to'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $headers = "From: ramontiwari086@gmail.com";

    if(mail($to, $subject, $message, $headers)) {
        echo " Mail sent successfully.";
    } else {
        echo " Mail sending failed.";
    }
}
?>

<form method="POST">
  To: <input type="email" name="to" required /><br>
  Subject: <input type="text" name="subject" required /><br>
  Message:<br>
  <textarea name="message" rows="5" cols="30" required></textarea><br>
  <input type="submit" name="send" value="Send Mail" />
</form>

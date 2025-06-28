<?php
// Set cookie with past time to delete it
setcookie("user_data", "", time() - 3600);
echo " Cookie deleted (expired 1 hour ago).";
?>

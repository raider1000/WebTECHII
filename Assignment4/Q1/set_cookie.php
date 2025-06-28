<?php
$username = "ramohan";
$roll = "Bca6th";
$email = "ramohan@mail.com";

// Set cookie for 3 days
setcookie("user_data", "$username|$roll|$email", time() + (3 * 24 * 60 * 60));

// Check if cookie is set
if(isset($_COOKIE['user_data'])) {
    echo "Cookie is enabled. Value: " . $_COOKIE['user_data'];
} else {
    echo "Cookie is not set (yet). Refresh to check again.";
}
?>

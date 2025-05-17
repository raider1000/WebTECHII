<?php
include 'db.php';

$email = $_GET['emailid'];
$result = $conn->query("SELECT * FROM contacts WHERE emailid='$email'");

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<h2>Details</h2>";
    echo "<p>Name: {$row['firstname']}</p>";
    echo "<p>Designation: {$row['designation']}</p>";
    echo "<p>Address1: {$row['address1']}</p>";
    echo "<p>Address2: {$row['address2']}</p>";
    echo "<p>City: {$row['city']}</p>";
    echo "<p>State: {$row['state']}</p>";
    echo "<p>Email: {$row['emailid']}</p>";
} else {
    echo "No contact found.";
}
?>

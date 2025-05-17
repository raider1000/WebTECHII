<?php
include 'db.php';

$stmt = $conn->prepare("INSERT INTO contacts (firstname, designation, address1, address2, city, state, emailid)
VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $_POST['firstname'], $_POST['designation'], $_POST['address1'], $_POST['address2'], $_POST['city'], $_POST['state'], $_POST['emailid']);
$stmt->execute();

echo "Contact added! <a href='index.php'>Back</a>";
?>

<?php
include 'db.php';
$id = $_GET['id'];
$conn->query("DELETE FROM contacts WHERE id=$id");
echo "Deleted! <a href='index.php'>Back</a>";
?>

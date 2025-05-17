<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Address Book</title>
<link rel="stylesheet" href="style.css">

</head>
<body>

<h2>Add New Contact</h2>
<div class="container">
    <form action="insert.php" method="POST">
    First Name:<br> <input name="firstname" required><br>
    Designation:<br> <input name="designation"><br>
    Address1:<br> <input name="address1"><br>
    Address2:<br> <input name="address2"><br>
    City:<br> <input name="city"><br>
    State:<br> <input name="state"><br>
    Email:<br> <input name="emailid" type="email" required><br>
    <button type="submit">Add</button>
</form>

</div>


<h2>Search Contact by Email</h2>
<div class="container">

<form action="search.php" method="GET">
    <input type="email" name="emailid" placeholder="Enter email">
    <button type="submit">Search</button>
</form>
</div>

<h2>All Contacts</h2>
<?php
$result = $conn->query("SELECT * FROM contacts");
while($row = $result->fetch_assoc()) {
    echo "<p>{$row['firstname']} | {$row['emailid']} 
    <a href='update.php?id={$row['id']}'>Edit</a> | 
    <a href='delete.php?id={$row['id']}'>Delete</a></p>";
}
?>

</body>
</html>

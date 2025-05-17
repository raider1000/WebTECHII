<?php include 'db.php';

$id = $_GET['id'];
$data = $conn->query("SELECT * FROM contacts WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $conn->prepare("UPDATE contacts SET firstname=?, designation=?, address1=?, address2=?, city=?, state=?, emailid=? WHERE id=?");
    $stmt->bind_param("sssssssi", $_POST['firstname'], $_POST['designation'], $_POST['address1'], $_POST['address2'], $_POST['city'], $_POST['state'], $_POST['emailid'], $id);
    $stmt->execute();
    echo "Updated! <a href='index.php'>Back</a>";
} else {
?>

<form method="POST">
    First Name: <input name="firstname" value="<?= $data['firstname'] ?>"><br>
    Designation: <input name="designation" value="<?= $data['designation'] ?>"><br>
    Address1: <input name="address1" value="<?= $data['address1'] ?>"><br>
    Address2: <input name="address2" value="<?= $data['address2'] ?>"><br>
    City: <input name="city" value="<?= $data['city'] ?>"><br>
    State: <input name="state" value="<?= $data['state'] ?>"><br>
    Email: <input name="emailid" value="<?= $data['emailid'] ?>"><br>
    <button>Update</button>
</form>

<?php } ?>

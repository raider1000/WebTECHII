<?php
include 'connect.php';

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $userid = $_POST['userid'] ?? '';
    $password = $_POST['password'] ?? '';
    $fname = $_POST['fname'] ?? '';
    $address = $_POST['address'] ?? '';
    $country = $_POST['country'] ?? '';
    $zip = $_POST['zip'] ?? '';
    $email = $_POST['email'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $language = $_POST['language'] ?? [];
    $about = $_POST['about'] ?? '';

    // Regex patterns
    $Regex_id = "/^[a-zA-Z0-9]{5,12}$/";
    $RegexPass = "/^[a-zA-Z0-9]{7,12}$/";
    $RegexName = "/^[a-zA-Z]{2,}$/";
    $RegexAddress = "/^[a-zA-Z0-9\s]{2,}$/";
    $RegexZip = "/^[0-9]{5,6}$/";
    $RegexEmail = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";


    if (!preg_match($Regex_id, $userid)) {
        $errors['userid'] = "User ID must be 5-12 characters (letters/numbers only).";
    }

    if (!preg_match($RegexPass, $password)) {
        $errors['password'] = "Password must be 7-12 characters (letters/numbers only).";
    }

    if (!preg_match($RegexName, $fname)) {
        $errors['fname'] = "First name must be at least 2 letters.";
    }

    if (!empty($address) && !preg_match($RegexAddress, $address)) {
        $errors['address'] = "Address must be at least 2 alphanumeric characters.";
    }

    if (!empty($zip) && !preg_match($RegexZip, $zip)) {
        $errors['zip'] = "ZIP must be 5 or 6 digits.";
    }

    if (!preg_match($RegexEmail, $email)) {
        $errors['email'] = "Invalid email format.";
    }

    if (empty($gender)) {
        $errors['gender'] = "Please select a gender.";
    }

    if (empty($language)) {
        $errors['language'] = "Please select at least one language.";
    }

    if (empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $langString = implode(", ", $language);
        //Here we are Convert array to comma-separated string

        $stmt = $conn->prepare("INSERT INTO users (userid, password, fname, address, country, zip, email, gender, language, about)
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("ssssssssss", $userid, $hashedPassword, $fname, $address, $country, $zip, $email, $gender, $langString, $about);

        if ($stmt->execute()) {
            echo "<h2 style='color: green;'> New record created successfully</h2>";
        } else {
            echo "<h2 style='color: red;'> Error: " . $stmt->error . "</h2>";
        }

        $stmt->close();
        $conn->close();
    } else {
        include 'form.php';
        echo "<h2 style='color: red;'>Please correct the following errors:</h2><ul style='color:red;'>";
        foreach ($errors as $msg) {
            echo "<li>$msg</li>";
        }
        echo "</ul>";
    }
} else {
    header("Location: form.php");
    exit;
}

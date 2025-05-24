<?php
$resumeDir = "resumes/";
$photoDir = "photos/";

// Create directories if not exist
if (!is_dir($resumeDir)) mkdir($resumeDir);
if (!is_dir($photoDir)) mkdir($photoDir);

// Resume 
if (isset($_FILES['resume']) && is_uploaded_file($_FILES['resume']['tmp_name'])) {
    $resume = $_FILES['resume'];
    $name = basename($resume['name']);
    $path = $resumeDir . $name;
    $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
    $size = $resume['size'];

    if (file_exists($path)) {
        echo "Resume already exists.<br>";
    } elseif (!in_array($ext, ['pdf', 'doc'])) {
        echo "Resume must be PDF or DOC.<br>";
    } elseif ($size > 512000) {
        echo "Resume must be under 500KB.<br>";
    } else {
        move_uploaded_file($resume['tmp_name'], $path);
        echo "Resume uploaded.<br>";
    }
}

// Photo 
if (isset($_FILES['photo']) && is_uploaded_file($_FILES['photo']['tmp_name'])) {
    $photo = $_FILES['photo'];
    $name = basename($photo['name']);
    $path = $photoDir . $name;
    $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
    $size = $photo['size'];

    if (file_exists($path)) {
        echo "Photo already exists.<br>";
    } elseif (!in_array($ext, ['jpg', 'jpeg'])) {
        echo "Photo must be JPG or JPEG.<br>";
    } elseif ($size > 1048576) {
        echo "Photo must be under 1MB.<br>";
    } else {
        move_uploaded_file($photo['tmp_name'], $path);
        echo "Photo uploaded.<br>";
    }
}

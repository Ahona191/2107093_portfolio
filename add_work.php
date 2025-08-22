<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
    $link = $conn->real_escape_string($_POST['link']);
    $image = '';

    // Check if file is uploaded
    if (!empty($_FILES['image']['name'])) {
        $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
        $image_name = basename($_FILES['image']['name']);
        $image_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
        $image_name = time() . '_' . uniqid() . '.' . $image_ext; // unique name
        $target = 'uploads/' . $image_name;

        if (in_array($image_ext, $allowed_ext)) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $image = $image_name;
            } else {
                die("Failed to upload image.");
            }
        } else {
            die("Invalid image file type. Allowed types: " . implode(', ', $allowed_ext));
        }
    } else {
        die("No image file selected.");
    }

    $sql = "INSERT INTO works (title, description, link, image) VALUES ('$title', '$description', '$link', '$image')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        die("Database error: " . $conn->error);
    }
} else {
    die("Invalid request method.");
}


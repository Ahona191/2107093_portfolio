<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    // Delete image file first
    $result = $conn->query("SELECT image FROM works WHERE id=$id");
    $row = $result->fetch_assoc();
    if ($row && $row['image'] && file_exists("uploads/" . $row['image'])) {
        unlink("uploads/" . $row['image']);
    }

    // Delete from database
    $conn->query("DELETE FROM works WHERE id=$id");
}

header("Location: index.php");
exit();
?>

<?php
session_start();
require_once 'database.php';

if(isset($_POST['submit'])){    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $id = $_POST['id'];

    // Include necessary files
    include '../class/edit_class.php';
    include '../class/edit_contro.php';

    // Create bookcontro instance
    $update = new edit_contro($username, $email, $phone_number, $id);

    // Book appointment
    $update = $update->update();

    // Redirect based on success or failure
    if ($update) {
        header("Location: ../admin_edit.php?success");
        exit();
    } else {
        header("Location: ../book.php?failed");
        exit();
    }
}
?>

<?php
include 'database.php';

if(isset($_POST['delete'])) {
    
    $appointment_id = $_POST['appointment_id'];

    include "../class/delete_class.php";
    include "../class/delete_contro.php";
    

    // Create bookcontro instance
    $deleteObj = new delete_contro($appointment_id);

    // Book appointment
    $deleteObj = $deleteObj->delete();

    // Redirect based on success or failure
    if ($deleteObj) {
        header("Location: ../ .php?success");
        exit();
    } else {
        header("Location: ../book.php?failed");
        exit();
    }
}
?>

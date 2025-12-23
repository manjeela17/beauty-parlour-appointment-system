<?php
include 'database.php';

if(isset($_POST['accept'])) {
    
    $appointment_id = $_POST['appointment_id'];

    include "../class/accept_class.php";
    include "../class/accept_contro.php";
    

    // Create bookcontro instance
    $acceptObj = new accept_contro($appointment_id);

    // Book appointment
    $acceptObj = $acceptObj->accept();

    // Redirect based on success or failure
    if ($acceptObj) {
        header("Location: ../ac_book.php?success");
        exit();
    } else {
        header("Location: ../book.php?failed");
        exit();
    }
}


?>

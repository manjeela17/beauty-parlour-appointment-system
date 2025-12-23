<?php
include 'database.php';

if(isset($_POST['cancel'])) {
    
    $appointment_id = $_POST['appointment_id'];

    include "../class/cancel_class.php";
    include "../class/cancel_contro.php";
    

    // Create bookcontro instance
    $cancelObj = new cancel_contro($appointment_id);

    // Book appointment
    $cancelObj = $cancelObj->cancel();

    // Redirect based on success or failure
    if ($cancelObj) {
        header("Location: ../cancel_user.php?success");
        exit();
    } else {
        header("Location: ../book.php?failed");
        exit();
    }
}
?>

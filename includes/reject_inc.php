<?php
include 'database.php';

if(isset($_POST['reject'])) {
    
    $appointment_id = $_POST['appointment_id'];

    include "../class/reject_class.php";
    include "../class/reject_contro.php";
    

    // Create bookcontro instance
    $rejectObj = new reject_contro($appointment_id);

    // Book appointment
    $rejectObj = $rejectObj->reject();

    // Redirect based on success or failure
    if ($rejectObj) {
        header("Location: ../re_book.php?success");
        exit();
    } else {
        header("Location: ../book.php?failed");
        exit();
    }
}
?>

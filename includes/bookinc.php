<?php
session_start();
require_once 'database.php';

if(isset($_POST['submit'])){    
    $userid = htmlspecialchars($_SESSION['user_id']);
    $customername = htmlspecialchars($_SESSION['user_username']); 
   
    $appointmentdate = $_POST['appointment_date'];
    $appointmenttime = $_POST['appointment_time'];
    $category = $_POST['selectCategory'];
    $service = $_POST['serviceSelection'];

    // Include necessary files
    include '../class/bookclass.php';
    include '../class/bookcontro.php';

    // Create bookcontro instance
    $book = new bookcontro($userid, $customername, $appointmentdate, $appointmenttime, $category, $service);

    // Book appointment
    $bookingStatus = $book->booknow();

    // Redirect based on success or failure
    if ($bookingStatus) {
        header("Location: ../booked.php?success");
        exit();
    } else {
        header("Location: ../already.php?failed");
        exit();
    }
}
?>
